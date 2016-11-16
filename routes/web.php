<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Auth::routes();

Route::group(['namespace' => 'admin'], function () {
    Route::any('/admin/{param1?}/{param2?}/{param3?}',array('uses' => 'ViewController@setPage'))
        ->where(array('admin' => '[A-Za-z0-9]+', 'param1' => '[A-Za-z0-9]+', 'param2' => '[A-Za-z0-9]+', 'param3' => '[A-Za-z0-9]+'));
});

Route::any('/{page?}/{param1?}/{param2?}/{param3?}',array('uses' => 'ViewController@setPage'))
    ->where(array('page' => '[A-Za-z0-9]+', 'param1' => '[A-Za-z0-9]+', 'param2' => '[A-Za-z0-9]+', 'param3' => '[A-Za-z0-9]+'));

