<?php

namespace App\Http\Controllers\watchlisted\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomModel;

class ActivityLogsController extends Controller
{
    public function index(){
        $data['title'] = 'Activity Logs';
        $data['actions']    = CustomModel::get_actions_wl();
       
        return view('watchlisted.admin.contents.activity_logs.activity_logs')->with($data);
    }
}
