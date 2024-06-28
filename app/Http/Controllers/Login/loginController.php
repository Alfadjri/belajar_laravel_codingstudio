<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

// create
// model
use App\Models\User as User;
use App\Models\Biodata as Biodata;

use App\Http\Requests\Login\Register as R_Create;
use App\Http\Requests\Login\V_login as V_Login;

class loginController extends Controller
{
    public function view_register(){
        return view("Login.Register");
    }
    public function view_login(){
        return view('Login.login');
    }
    public function login_send(V_Login $request){
        $value = $request->validated();
        $user = Auth::attempt(['email' => $value['email'],'password' => $value['password']]);
        if(!$user){
            return redirect()->route('login');
        }
        $user = Auth::user();
        $token = $user->createToken($user['email'],[$user->getRoleNames()])->plainTextToken;
        // return view('welcome');

        // contoh rest api 
        return response()->json([
            'pesan' => "berhasil login",
            "token" => $token,
        ],200);
    }

    public function logout(){
        if(Auth::check() == false){
            return false;
        }
        //
        Auth::user()->tokens()->each(function($tokens){
            if(Auth::user()->id == $tokens->id){
                $tokens->delete();
            }
        });
        //
        Auth::guard('web')->logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->back();
    }

    public function get_all_user(){
        $get_user = Biodata::get();
        return response()->json([
            'pesan' => "berhasil mengambil data",
            'result' => $get_user
        ],200);
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
