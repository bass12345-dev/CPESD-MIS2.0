<?php

namespace App\Http\Controllers\watchlisted\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomModel;
use App\Models\PersonModel;

class ToApproveController extends Controller
{
    private $person_table   = 'persons';
    private $records_table  = 'records';
    public function index(){

        $data['title'] = 'To Approve';
        $data['list'] = PersonModel::get_to_approve();
        return view('watchlisted.admin.contents.to_approve.to_approve')->with($data);
    }

    public function approve(Request $request){

        $id = $request->input('id')['id'];
        if (is_array($id)) {
            foreach ($id as $row) {
                $update = CustomModel::update_item($this->person_table, array('person_id' => $row), array('status'=> 'active'));
            }
            $data = array('message' => 'Approved Succesfully' , 'response' => true);
        }else{
             $data = array('message' => 'Error' , 'response' => false );
        }

        return response()->json($data);


    }
}
