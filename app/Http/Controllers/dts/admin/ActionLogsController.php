<?php

namespace App\Http\Controllers\dts\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\CustomModel;
use App\Services\ActionLogsService;
class ActionLogsController extends Controller
{
    protected $actionLogsService;
    public function __construct(ActionLogsService $actionLogsService){
        $this->actionLogsService = $actionLogsService;
    }

    public function index(){
        $data['title']      = 'Action Logs';
        return view('dts.admin.contents.action_logs.action_logs')->with($data);
    }

    public function action_logs(){
        $month = '';
        $year = '';
        if(isset($_GET['m'])){
            $month =   date('m', strtotime($_GET['m']));
            $year =   date('Y', strtotime($_GET['m']));
        }else {
            $month = Carbon::now()->month;
            $year = Carbon::now()->year;
        }
        $user = $this->actionLogsService->AllActionLogs($month,$year);
        return response()->json($user);
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

    public static function wl_add_action($action,$user_type,$_id){

        $items  = array(
            'action'            => $action,
            'web_type'          => 'wl',
            'user_type'         => $user_type,
            'user_id'           =>  session('watch_id'),
            '_id'               =>  $_id,
            'action_datetime'   => Carbon::now()->format('Y-m-d H:i:s'),
           
        );

        CustomModel::insert_item('action_logs', $items);

        
    }

    
}



