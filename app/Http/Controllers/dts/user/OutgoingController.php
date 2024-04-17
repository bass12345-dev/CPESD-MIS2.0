<?php

namespace App\Http\Controllers\dts\user;

use App\Http\Controllers\Controller;
use App\Models\DocumentsModel;
use Illuminate\Http\Request;
use App\Models\CustomModel;
use Carbon\Carbon;

class OutgoingController extends Controller
{
    private $user_table             = "users";
    private  $history_table         = "history";
    private  $documents_table       = 'documents';
    private $office_table           = "offices";
    private $outgoing_table         = 'outgoing_documents';
    public function index(){
        $data['title'] = 'Outgoing Documents';
        return view('dts.users.contents.outgoing.outgoing')->with($data);
    }

    public function get_outgoing_documents(){

        $items = DocumentsModel::get_outgoing_documents();
        $i = 1;
        $data = [];
        foreach ($items as $key) {

            $data[] = array(
                'number'            => $i++,
                'doc_id'            => $key->outgoing_id.'-'.$key->doc_id,
                'tracking_number'   => $key->tracking_number,
                'document_name'     => $key->document_name,
                'name'              => $key->first_name.' '.$key->middle_name.' '.$key->last_name.' '.$key->extension,
                'type_name'         => $key->type_name,
                'remarks'           => $key->remarks,
                'outgoing_date'     => date('M d Y - h:i a', strtotime($key->outgoing_date))
            );
          
        }

        return response()->json($data);
    }

    public function received_from_outgoing(Request $request){


        $items = $request->input('id')['items'];


        if (is_array($items)) {

            foreach ($items as $row) {

                $x                  = explode('-', $row);
                $outgoing_id        = $x[0];
                $document_id        = $x[1];

                $doc_info = array(
                    'doc_status' => 'pending',
                 );
                $outgoing_info = array(
                    'status'                    => 'return',
                    'outgoing_date_received'    => Carbon::now()->format('Y-m-d H:i:s'),
                 );
                 
                $where1 = array('document_id' => $document_id);
                $where2 = array('outgoing_id' => $outgoing_id);
                $update_outgoing = CustomModel::update_item($this->outgoing_table,$where2,$outgoing_info);
                $update_document = CustomModel::update_item($this->documents_table,$where1,$doc_info);
                $resp = array('message' => 'Received Successfully', 'response' => true);
                
            }

        } else {
            $resp = array('message' => 'Error', 'response' => false);
        }
        return response()->json($resp);

    }
}
