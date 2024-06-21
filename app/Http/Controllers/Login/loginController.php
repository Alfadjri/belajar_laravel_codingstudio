<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

// create
// model
use App\Models\User as User;
use App\Models\Biodata as Biodata;

use App\Http\Requests\Login\Register as R_Create;

class loginController extends Controller
{
    public function view_register(){
        return view("Login.Register");
    }
    public function view_login(){
        return view('welcome');
    }

    public function send_register(R_Create $request){
        $value = $request->validated();
        // input di database
        $id_user = User::create([
            'email' => $value['email'],
            'password' => Hash::make($value['password']),
        ]);
        Biodata::create([
            'id_user' => $id_user->id,
            'nama_lengkap' => $value['nama_lengkap'],
            'no_handphone' => $value['password'],
        ]);

        return redirect()->route('login');
    }
}
