<?php

namespace App\Http\Controllers\dts\receiver;

use App\Http\Controllers\Controller;
use App\Http\Controllers\dts\user\MyDocumentsController;
use App\Models\DocumentsModel;
use App\Models\CustomModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class ReceivedDocumentsController extends Controller
{
    private  $history_table        = "history";
    
    public function index(){
        $data['title'] = 'All Documents';
        $data['documents'] = $this->get_all_documents();
        return view('dts.receiver.contents.all_documents.all_documents')->with($data);
    }


    public function get_all_documents(){

        $rows = DocumentsModel::get_all_documents();
        $data = [];
        $i = 1;

        foreach ($rows as $value => $key) {

            $delete_button              = CustomModel::q_get_where($this->history_table,array('t_number' => $key->tracking_number))->count() > 1 ? true : false;
            $status                     = (CustomModel::q_get_where($this->history_table,array('t_number' => $key->tracking_number,'status'=>'completed'))->count() > 0) ? 'Completed' : 'Pending';
 


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

    public function complete(Request $request){
        
        $id    = $request->input('id');
        $tracking_number    = $request->input('t_number');

        $update_receive     = DB::table('history')
                    ->where('history.history_id', $id)
                    ->update(array('status' => 'completed','final_action_taken' => $request->input('final_action_taken'), 'remarks' => $request->input('remarks1') ));

         if($update_receive) {

            $update_receive     = DB::table('documents')
                    ->where('tracking_number', $tracking_number)
                    ->update(array('doc_status' => 'completed'));


            $data = array('message' => 'Completed Succesfully' , 'response' => true );
                

        }else {

            $data = array('message' => 'Something Wrong' , 'response' => false );

        }
        
    }

}
