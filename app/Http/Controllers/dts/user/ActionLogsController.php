<?php

namespace App\Http\Controllers\dts\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomModel;

class ActionLogsController extends Controller
{
    public function index(){
        $data['title']      = 'Action Logs';
       
        return view('dts.users.contents.action_logs.action_logs')->with($data);
    }

    public function action_logs(){
        $data = [];
        $i = 1;
        $items = CustomModel::get_user_actions_dts();
        foreach ($items as $value => $key) {
            $data[] = array(
                'number'            => $i++,
                'tracking_number'   => $key->tracking_number,
                'action'            => $key->action,
                'action_datetime'   => date('M d Y h:i A', strtotime($key->action_datetime))
                
            );
        }
        return response()->json($data);
    }
}
