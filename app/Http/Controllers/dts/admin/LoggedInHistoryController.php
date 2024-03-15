<?php

namespace App\Http\Controllers\dts\admin;

use App\Http\Controllers\Controller;
use App\Models\CustomModel;
use Illuminate\Http\Request;

class LoggedInHistoryController extends Controller
{
    public function index()
    {
        $data['title']      = 'Logged in History';
        $data['l_i_h']      =  CustomModel::get_logged_in_history();
        return view('dts.admin.contents.logged_in_history.logged_in_history')->with($data);
    }
}
