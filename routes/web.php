<?php

use Illuminate\Support\Facades\Route;

// panggil controller
use App\Http\Controllers\Route\Login\Logincontroller as C_login;
use App\Http\Controllers\Route\Admin\adminController as C_admin;
Route::group(['prefix' => 'login'],function(){
    Route::get('/',[C_Login::class,'view_login'])->name('login');
    Route::post('/',[C_Login::class,'login_send'])->name('login.send');
    Route::get('/register',[C_login::class,'view_register'])->name('login.register');
    Route::post('/register',[C_login::class,'send_register'])->name('login.register.send');
});

Route::group(['prefix' => "admin" , "middleware" => ['auth','Role:admin']],function(){
    Route::get('/logout',[C_login::class,'logout_send'])->name('logout');
    Route::get('/',[C_admin::class,'dashboard'])->name('admin');
});
// Route::group(['prefix' => "user" , "middleware" => ['auth','Role:user']],function(){
//     Route::get('/',[C_login::class,'get_all_user'])->name('user');
// });
