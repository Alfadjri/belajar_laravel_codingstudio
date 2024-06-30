<?php

namespace App\Http\Controllers\component\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User as User;
use App\Models\Biodata as Biodata;
use Illuminate\Support\Facades\Hash;

class login_component extends Controller
{
    private $roles = array();

    public function login(String $email , String $password){
        $user = Auth::attempt(['email' => $email,'password' => $password]);
        if(!$user){
            return false;
        }
        $user = Auth::user();
        $token = $user->createToken($user['email'],[$user->getRoleNames()])->plainTextToken;
        $this->roles = Auth::user()->getRoleNames();
        return $token;
    }

    public function register(String $email , String $password, String $nama_lengkap , String $no_headphone){
        $id_user = User::create([
            'email' => $email,
            'password' => Hash::make($password),
        ]);
        Biodata::create([
            'id_user' => $id_user->id,
            'nama_lengkap' => $nama_lengkap,
            'no_handphone' => $no_headphone,
        ]);
        return true;
    }

    public function get_role(){
        return $this->roles;
    }

    public function logout(){
        if(Auth::check() == false){
            return false;
        }
        Auth::user()->tokens()->each(function($tokens){
            if(Auth::user()->id == $tokens->id){
                $tokens->delete();
            }
        });
        Auth::guard('web')->logout();
        session()->invalidate();
        session()->regenerateToken();
        return true;
    }
}
