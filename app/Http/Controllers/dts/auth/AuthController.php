<?php

namespace App\Http\Controllers\dts\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(){

        return view('dts.auth.login');
    }

    public function dts_logout(){

       return redirect('/dts');
    }
}
