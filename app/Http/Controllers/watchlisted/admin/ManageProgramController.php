<?php

namespace App\Http\Controllers\Watchlisted\admin;

use App\Http\Controllers\Controller;
use App\Models\CustomModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ProgramController;
use Carbon\Carbon;

class ManageProgramController extends Controller
{
    public $programs_table = 'programs';
    public $program_block_table = 'program_block';
    public $now;
    public function __construct()
    {
        $this->now = new \DateTime();
        $this->now->setTimezone(new \DateTimezone('Asia/Manila'));
    }
    public function index()
    {
        $data['title'] = 'Manage Programs';
        $data['programs'] = CustomModel::q_get_order($this->programs_table, 'program', 'asc')->get();
        return view('watchlisted.admin.contents.manage_program.manage_program')->with($data);
    }

    public function store(Request $request){

        $items = array(

            'program'                   => $request->input('program'),
            'program_description'       => $request->input('program_description'),
            'created'                   => Carbon::now()->format('Y-m-d H:i:s') ,
        );

        
        if(!empty($items['program'])) {

        $add = CustomModel::insert_item($this->programs_table,$items);
    
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

        $id = $request->input('id');
        $items = array(
            'program'               => $request->input('program'),
            'program_description'   => $request->input('program_description'),
        );
        if(!empty($id)) {
            $update = CustomModel::update_item($this->programs_table,array('program_id' => $id),$items);
          if ($update) {
                 $data = array('message' => 'Updated Successfully' , 'response' => true );
            }else {
                $data = array('message' => 'Something Wrong/No Changes Apply' , 'response' => false );
            }
        }else {
            $data = array('message' => 'Something Wrong' , 'response' => false );
        }
        return response()->json($data);
    }
    public function delete(Request $request)
    {
        $id = $request->input('id');
        $check = CustomModel::q_get_where($this->program_block_table, array('program_id' => $id))->count();

        if ($check > 0) {
            $data = array('message' => 'This type of document is used in other operation', 'response' => false);
        } else {
            $delete = CustomModel::delete_item($this->programs_table, array('program_id' => $id));
            if ($delete) {
                $data = array('message' => 'Deleted Succesfully', 'response' => true);
            } else {
                $data = array('message' => 'Error', 'response' => false);
            }
        }

        return response()->json($data);
    }


}
