<?php

namespace App\Http\Controllers\dts\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\CustomModel;
class ActionLogsController extends Controller
{
    
    public function index(){
        $data['title']      = 'Action Logs';
        $data['actions']    = CustomModel::get_actions_dts();
        return view('dts.admin.contents.action_logs.action_logs')->with($data);
    }

    public static function dts_add_action($action,$user_type,$_id){

        $items  = array(
            'action'            => $action,
            'web_type'          => 'dts',
            'user_type'         => $user_type,
            'user_id'           =>  session('_id'),
            '_id'               =>  $_id,
            'action_datetime'   => Carbon::now()->format('Y-m-d H:i:s'),
           
        );

        CustomModel::insert_item('action_logs', $items);

        
    }
}
