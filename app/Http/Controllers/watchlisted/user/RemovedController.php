<?php

namespace App\Http\Controllers\watchlisted\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomModel;

class RemovedController extends Controller
{
    private $person_table = 'persons';
    public function index(){

        $data['title']           = 'Removed';
        return view('watchlisted.users.contents.removed.removed')->with($data);
    }

    public function get_removed_list(){
        
        $items       =  CustomModel::q_get_where_order($this->person_table,array('added_by' => session('watch_id'),'status'=>'inactive'),'created_at','desc')->get();
        $i = 1;
        $data = [];
        foreach ($items as $row) {
            $data[] = array(
                        'name'              => $row->first_name.' '.$row->middle_name.' '.$row->last_name.' '.$row->extension,
                        'age'               => $row->age,
                        'address'           => $row->address,
                        'email'             => $row->email_address,
                        'phone_number'      => $row->phone_number,
                        'number'            => $i++,
                        'person_id'         => $row->person_id
            );
           
        }
        return response()->json($data);
    }
}
