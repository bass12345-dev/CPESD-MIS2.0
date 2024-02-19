<?php

namespace App\Http\Controllers\dts\admin;

use App\Http\Controllers\Controller;
use App\Models\CustomModel;
use App\Models\DocumentsModel;
use Illuminate\Http\Request;

class AllDocumentsController extends Controller
{   
    public $document_type_table = "document_types";
    public $history_table       = "history";
    public $documents_table      = "documents";
    public function index(){


        $data['title']                = 'All Documents';
        $data['document_types']       = CustomModel::q_get($this->document_type_table);
        $data['documents']            = $this->get_all_documents();
        return view('dts.admin.contents.all_documents.all_documents')->with($data);
    }

    public function get_all_documents(){

        $rows = DocumentsModel::get_all_documents();
        $data = [];
        $i = 1;

        foreach ($rows as $value => $key) {

            $delete_button              = CustomModel::q_get_where($this->history_table,array('t_number' => $key->tracking_number))->count() > 1 ? true : false;
            $status                     = (CustomModel::q_get_where($this->history_table,array('t_number' => $key->tracking_number,'status' => 'completed'))->count() == 1) ? 'Completed' : 'Pending';
 


            $data[] = array(
                    'number'            => $i++,
                    'tracking_number'   => $key->tracking_number,
                    'document_name'     => $key->document_name,
                    'type_name'         => $key->type_name,
                    'created'           => $key->created,
                    'a'                 => $delete_button,
                    'document_id'       => $key->document_id,
                    'created_by'        => $key->first_name.' '.$key->middle_name.' '.$key->last_name.' '.$key->extension,
                    'is'                => $status
            );
        }


        return $data;

    }


    public function delete(Request $request)
    {

        $id = $request->input('id')['id'];


        if (is_array($id)) {
            foreach ($id as $row) {
                $delete = CustomModel::q_get_where($this->documents_table, array('document_id' => $row));
                $tracking_number = $delete->get()[0]->tracking_number;
                $delete->delete();
                CustomModel::delete_item($this->history_table, array('t_number' => $tracking_number));
            }
           
            $data = array('message' => 'Deleted Succesfully', 'response' => true);
        } else {
            $data = array('message' => 'Error', 'response' => false);
        }

     

         return response()->json($data);
    }
    
}
