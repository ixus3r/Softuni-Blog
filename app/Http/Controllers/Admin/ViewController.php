<?php
/**
 * Created by PhpStorm.
 * User: rainbowmbp
 * Date: 13/11/2016
 * Time: 21:02
 */

namespace app\Http\Controllers\Admin;


class ViewController{


    public function __construct(){

    }


    public function setPage(...$params){
     return  $this->showView($params);
    }


    public function showView($pageParam){
        return view('admin.admin',['pageInfo' => $pageParam]);
    }

}