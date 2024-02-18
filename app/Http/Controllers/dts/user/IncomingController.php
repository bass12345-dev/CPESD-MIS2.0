<?php

namespace App\Http\Controllers\dts\user;

use App\Http\Controllers\Controller;
use App\Models\DocumentsModel;
use Illuminate\Http\Request;

class IncomingController extends Controller
{
    
    public function index(){
        $data['title'] = 'Incoming Documents';
        $data['incoming_documents']	= $this->get_incoming_documents();
        return view('dts.users.contents.incoming.incoming')->with($data);
    }

    public function get_incoming_documents(){

        $data = [];
        $rows = DocumentsModel::get_incoming_documents();
        foreach ($rows as $value => $key) {

          

            $data[] = array(

                    'tracking_number'   => $key->tracking_number,
                    'document_name'     => $key->document_name,
                    'type_name'         => $key->type_name,
                    'released_date'     => date('M d Y - h:i a', strtotime($key->release_date)) ,
                    'from'              => $key->first_name.' '.$key->middle_name.' '.$key->last_name.' '.$key->extension,
                    'document_id'       => $key->document_id,
                    'history_id'        => $key->history_id,
                    'remarks'           => $key->remarks,
                    'a'                 => $key->user_type == 'admin' ? true : false
            );
        }

        return $data;

    }
}
