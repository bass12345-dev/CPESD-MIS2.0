<?php

namespace App\Http\Controllers\dts\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomModel;

class ActionLogsController extends Controller
{
    public function index(){
        $data['title']      = 'Action Logs';
        $data['actions']    = CustomModel::get_user_actions_dts();
        return view('dts.users.contents.action_logs.action_logs')->with($data);
    }
}
