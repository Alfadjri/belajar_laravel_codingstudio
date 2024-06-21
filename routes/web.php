<?php

use Illuminate\Support\Facades\Route;

// panggil controller
use App\Http\Controllers\Login\loginController as C_login;

Route::group(['prefix' => 'login'],function(){
    Route::get('/',[C_Login::class,'view_login'])->name('login');
    Route::get('/register',[C_login::class,'view_register'])->name('login.register');
    Route::post('/register',[C_login::class,'send_register'])->name('login.register.send');
});

