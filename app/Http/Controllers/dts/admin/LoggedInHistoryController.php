<?php

namespace App\Http\Controllers\dts\admin;

use App\Http\Controllers\Controller;
use App\Models\CustomModel;
use App\Services\LoginHistoryServices;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;

class LoggedInHistoryController extends Controller
{
    protected $loginHistoryService;
    public function __construct(LoginHistoryServices $loginHistoryService){
        $this->loginHistoryService = $loginHistoryService;
    }
    public function index()
    {
        $data['title']      = 'Logged in History';
        $data['current']    = Carbon::now()->year.'-'.Carbon::now()->month;
        return view('dts.admin.contents.logged_in_history.logged_in_history')->with($data);
       
    }

    public function login_history(){
        $month = '';
        $year = '';
        if(isset($_GET['m'])){
            $month =   date('m', strtotime($_GET['m']));
            $year =   date('Y', strtotime($_GET['m']));
        }
        $user = $this->loginHistoryService->AllLoginHistory($month,$year);
        return response()->json($user);
       
    }

}
