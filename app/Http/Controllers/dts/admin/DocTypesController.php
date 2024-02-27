<?php

namespace App\Http\Controllers\dts\admin;

use App\Http\Controllers\Controller;
use App\Models\CustomModel;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DocTypesController extends Controller
{   
    public $doc_types_table = "document_types";
    public $documents_table = "documents";
    public $now;
    public function __construct()
    {
        $this->now = new \DateTime();
        $this->now->setTimezone(new \DateTimezone('Asia/Manila'));
    }
    public function index()
    {
        $data['title']      = 'Manage Document Types';
        $data['types']      = CustomModel::q_get($this->doc_types_table)->get();
        return view('dts.admin.contents.doc_types.doc_types')->with($data);
    }
    
    public function store(Request $request){

        $items = array(
            'type_name'     => $request->input('type'),
            'created'       => Carbon::now()->format('Y-m-d H:i:s') ,
        );

        if(!empty($items['type_name'])) {
        $add = CustomModel::insert_item($this->doc_types_table,$items);
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
        $where      = array('type_id' => $request->input('id'));
        $data       = array('type_name'  => $request->input('type'));
        $update     = CustomModel::update_item($this->doc_types_table,$where,$data);
          if ($update) {
                $data = array('message' => 'Updated Successfully' , 'response' => true );
            }else {
                $data = array('message' => 'Something Wrong/No Changes Apply' , 'response' => false );
            }
            return response()->json($data);
    }

    public function delete(Request $request)
    {

        $id         = $request->input('id');
        $check      = CustomModel::q_get_where($this->documents_table,array('doc_type'=>$id))->count();
        if ($check > 0) {
             $data  = array('message' => 'This type of document is used in other operation' , 'response' => false);
        }else {
            $delete = CustomModel::delete_item($this->doc_types_table,array('type_id' => $id));
            if($delete) {
                    $data = array('message' => 'Deleted Succesfully' , 'response' => true);
                }else {
                    $data = array('message' => 'Error', 'response' => false);
                }
        }
        return response()->json($data);
    }

  
}
