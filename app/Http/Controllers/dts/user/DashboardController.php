<?php

namespace App\Http\Controllers\dts\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data['title'] = 'User Dashboard';
        return view('dts.users.contents.dashboard.dashboard')->with($data);
    }
}
