<?php

namespace App\Http\Controllers\dts\admin;

use App\Http\Controllers\Controller;
use App\Models\CustomModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FinalActionsController extends Controller
{   
    public $final_actions_table = "final_actions";
    public $history_table       = "history";
    public $now;
    public function __construct()
    {
        $this->now = new \DateTime();
        $this->now->setTimezone(new \DateTimezone('Asia/Manila'));
    }
    public function index()
    {
        $data['title']      = 'Manage Final Actions';
        $data['actions']    = CustomModel::q_get($this->final_actions_table)->get();
        return view('dts.admin.contents.final_actions.final_actions')->with($data);
    }

    public function store(Request $request){
        $items = array(
            'action_name'    => $request->input('type'),
            'created'        =>  Carbon::now()->format('Y-m-d H:i:s') ,
        );
        if(!empty($items['action_name'])) {
        $add = CustomModel::insert_item($this->final_actions_table,$items);
        if ($add) {
                $data = array('message' => 'Added Successfully' , 'response' => true );
            }else {
                $data = array('message' => 'Something Wrong' , 'response' => false );
            }
        }else {
            $data = array('message' => 'Empty Field' , 'response' => false );
        }
        return response()->json($data);

    }

    public function update(Request $request){
        $where      = array('action_id' => $request->input('id'));
        $data       = array('action_name'  => $request->input('type'));
        $update     = CustomModel::update_item($this->final_actions_table,$where,$data);
          if ($update) {
                $data = array('message' => 'Updated Successfully' , 'response' => true );
            }else {
                $data = array('message' => 'Something Wrong/No Changes Apply' , 'response' => false );
            }
        return response()->json($data);
    }

    public function delete(Request $request){
        $id         = $request->input('id');
        $check      = CustomModel::q_get_where($this->history_table,array('final_action_taken'=> $id))->count(); 
        if ($check > 0) {
             $data  = array('message' => 'This action is used in other operation' , 'response' => false);
        }else {
            $delete =  CustomModel::delete_item($this->final_actions_table,array('action_id' => $id));  
            if($delete) {
                    $data = array('message' => 'Deleted Succesfully' , 'response' => true);
                }else {
                    $data = array('message' => 'Error', 'response' => false);
                }
        }
        return response()->json($data);

    }
}
