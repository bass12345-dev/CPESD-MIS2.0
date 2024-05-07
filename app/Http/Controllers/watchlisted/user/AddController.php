<?php

namespace App\Http\Controllers\watchlisted\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomModel;
use Carbon\Carbon;
use App\Http\Controllers\dts\admin\ActionLogsController;
use Illuminate\Support\Facades\DB;


class AddController extends Controller
{
    private $person_table = 'persons';

    public function index(){

        $data['title']          = 'Add';
        $data['barangay']   = config('app.barangay');
        return view('watchlisted.users.contents.add.add')->with($data);
    }

    public function store(Request $request){

        $items = array(

            'first_name'                => $request->input('firstName'),
            'middle_name'               => $request->input('middleName'),
            'last_name'                 => $request->input('lastName'),
            'extension'                 => $request->input('extension'),
            'phone_number'              => $request->input('phoneNumber'),
            'address'                   => $request->input('address'),
            'email_address'             => $request->input('emailAddress'),
            'created_at'                => Carbon::now()->format('Y-m-d H:i:s') ,
            'status'                    => 'not-approved',
            'age'                       => $request->input('age'),
            'gender'                    => $request->input('gender'),
            'added_by'                  => session('watch_id')
        );

        
        $add = CustomModel::insert_item($this->person_table, $items);
        $id = DB::getPdo()->lastInsertId();
        if ($add) {
            
            ActionLogsController::wl_add_action($action = 'Added New Watchlisted | ' . $items['first_name'].' '.$items['middle_name'].' '.$items['last_name'], $user_type = 'user', $_id = $id);
                
            $data = array('id' => $id, 'message' => 'Added Successfully', 'response' => true);
        } else {
            $data = array('message' => 'Something Wrong', 'response' => false);
        }
        return response()->json($data);

    }
}
