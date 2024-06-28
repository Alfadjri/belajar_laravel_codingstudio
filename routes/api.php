<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login\loginController as C_login;

Route::post('/login',[C_login::class,'login_send']);

Route::group(['prefix' => "user" , "middleware" => ['auth:sanctum','Role:admin']],function(){
    Route::get('/',[C_login::class,'get_all_user']);
});
