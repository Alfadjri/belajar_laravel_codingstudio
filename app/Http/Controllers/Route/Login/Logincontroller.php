<?php

namespace App\Http\Controllers\Route\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// component
use App\Http\Controllers\component\Login\login_component as C_Login;

// Request 
use App\Http\Requests\Login\V_login as V_Login;
use App\Http\Requests\Login\Register as R_Create;


class Logincontroller extends C_Login
{
    public function view_register(){
        return view("Login.Register");
    }
    public function view_login(){
        return view('Login.login');
    }
    
    public function login_send(V_Login $request){
        $value = $request->validated();
        $response_login = $this->login($value['email'],$value['password']);
        if(!$response_login){
            return redirect()->route('login');
        }
        // get_role 
        $roles = $this->get_role();
        foreach($roles  as $role){
            if($role == "admin"){
                return redirect()->route('admin');
            }
        }
    }

    public function logout_send(){
        $response_logout = $this->logout();
        if($response_logout == false){
            return redirect()->route('admin');
        }
        return redirect()->route('login');
    }
    public function send_register(R_Create $request){
        $value = $request->validated();
        $status_create_user = $this->register($value['email'],$value['password'],$value['nama_lengkap'],$value['no_handphone']);
        return redirect()->route('login');
    }
}
