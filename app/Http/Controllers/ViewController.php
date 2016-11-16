<?php
/**
 * Created by PhpStorm.
 * User: rainbowmbp
 * Date: 12/11/2016
 * Time: 16:21
 */

namespace app\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Controller;


class ViewController extends Controller{

    private $default = array('page' => "home",'view' => "welcome");

    // Show a page by GET Request
    public function setPage(...$params){

        if(empty($params)){
            $params[0] = $this->default['page'];
        }

        $pageParam = DB::table('pages')->where('url',$params[0])->first();


        if(!empty($pageParam)){
            return $this->showView($pageParam);
        }else{
            return view("errors.503");
        }

    }

    public function showView($pageParam){
        return view("blog.{$pageParam->view}",['pageInfo' => $pageParam,'userRole' => $this->getRole()]);
    }

    public function getRole(){
        $userId = Auth::id();
        if(!$userId){
            return false;
        }
        $role = DB::table('user_role')->join('roles','roles.id','=','user_role.fki_role_id')->select('roles.role')->where('user_role.fki_user_id',$userId)->first();

        return $role->role;
    }


}