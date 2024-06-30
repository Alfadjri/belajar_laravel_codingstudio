<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\restApi\Login\loginController as C_login;
use App\Http\Controllers\restApi\Admin\User\userController as C_Admin_user;

Route::post('/login',[C_login::class,'login_send']);

Route::group(['prefix' => "user" , "middleware" => ['auth:sanctum','Role:admin']],function(){
    Route::get('/',[C_Admin_user::class,'search_user']);
    Route::get('/logout',[C_login::class,'logout_send']);
});
