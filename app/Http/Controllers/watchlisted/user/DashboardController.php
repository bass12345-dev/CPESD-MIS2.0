<?php

namespace App\Http\Controllers\watchlisted\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        
        $data['title']          = 'User Watchlisted Dashboard';
        return view('watchlisted.users.contents.dashboard.dashboard')->with($data);
    }
}
