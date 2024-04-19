<?php

namespace App\Http\Controllers\watchlisted\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomModel;

class ApprovedListController extends Controller
{

    private $person_table = 'persons';
    public function index(){

        $data['title']          = 'Approved List';
        return view('watchlisted.users.contents.approved_list.approved')->with($data);
    }

    public function get_approve_list(){
        $items       = CustomModel::q_get_where_order($this->person_table,array('added_by' => session('watch_id'),'status'=>'active'),'created_at','desc')->get();
        $i = 1;
        $data = [];
        foreach ($items as $row) {
            $data[] = array(
                        'name'              => $row->first_name.' '.$row->middle_name.' '.$row->last_name.' '.$row->extension,
                        'age'               => $row->age,
                        'address'           => $row->address,
                        'email'             => $row->email_address,
                        'phone_number'      => $row->phone_number,
                        'person_id'         => $row->person_id,
                        'number'            => $i++
            );
           
        }
        return response()->json($data);
    }
}
