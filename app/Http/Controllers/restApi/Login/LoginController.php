<?php

namespace App\Http\Controllers\restApi\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\component\Login\login_component as C_Login;
use App\Http\Requests\Login\V_login as V_Login;


class LoginController extends C_Login
{
    public function login_send(V_Login $request){
        $value = $request->validated();
        $response_login = $this->login($value['email'],$value['password']);
        if(!$response_login){
            return response()->json([
                'pesan' => "login gagal"
            ],404);
        }
        // get_role 
        return response()->json([
            'pesan' => "Berhasil",
            'security' => "Bearer Token",
            '__token' => $response_login
        ]);
    }
    public function logout_send(){
        $repsonse = $this->logout();
        if(!$repsonse){
            return response()->json([
                'pesan' => "Anda tidak boleh masuk sini ",
            ],403);
        }
        return response()->json([
            'pesan' => "berhasil logout",
        ],200);
    }
}
