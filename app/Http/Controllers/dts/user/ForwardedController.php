<?php

namespace App\Http\Controllers\dts\user;

use App\Http\Controllers\Controller;
use App\Models\DocumentsModel;
use Illuminate\Http\Request;
use App\Models\CustomModel;

class ForwardedController extends Controller
{
    public $user_table = "users";
    public function index(){
        $data['title'] = 'Forwarded Documents';
        $data['forwarded_documents'] = $this->get_forward_documents();
        $data['user_data']          = CustomModel::q_get_where($this->user_table,array('user_id' => session('_id')))->first();
        $data['users']              = CustomModel::q_get_where($this->user_table,array('user_status' => 'active'))->get();
        return view('dts.users.contents.forwarded.forwarded')->with($data);
    }

    
	public function get_forward_documents(){

        $data = [];
        $rows = DocumentsModel::get_forwarded_documents();
        foreach ($rows as $value => $key) {
 
             $data[] = array(
 
                     'tracking_number'   => $key->tracking_number,
                     'history_id'        => $key->history_id,
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
