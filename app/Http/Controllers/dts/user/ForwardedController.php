<?php

namespace App\Http\Controllers\dts\user;

use App\Http\Controllers\Controller;
use App\Models\DocumentsModel;
use Illuminate\Http\Request;

class ForwardedController extends Controller
{
    public function index(){
        $data['title'] = 'Forwarded Documents';
        $data['forwarded_documents'] = $this->get_forward_documents();
        return view('dts.users.contents.forwarded.forwarded')->with($data);
    }

    
	public function get_forward_documents(){

        $data = [];
        $rows = DocumentsModel::get_forwarded_documents();
        foreach ($rows as $value => $key) {
 
             $data[] = array(
 
                     'tracking_number'   => $key->tracking_number,
                     'document_name'     => $key->document_name,
                     'type_name'         => $key->type_name,
                     'released_date'     => date('M d Y - h:i a', strtotime($key->release_date)) ,
                     'forwarded_to'              => $key->first_name.' '.$key->middle_name.' '.$key->last_name.' '.$key->extension,
                     'document_id'       => $key->document_id,
                     'remarks'           => $key->remarks,
             );
         }
 
        return $data; 
 
      }
}
