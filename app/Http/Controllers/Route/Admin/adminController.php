<?php

namespace App\Http\Controllers\Route\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function dashboard(){
        return view('welcome');
    }
}
