<?php

namespace App\Http\Controllers\dts\receiver;
use App\Http\Controllers\Controller;
use App\Models\DocumentsModel;
use Illuminate\Support\Facades\DB;
use App\Models\CustomModel;

class IncomingController extends Controller
{
    private  $final_actions_table            = "final_actions";

    public function index(){
        $data['title'] = 'Incoming Documents';
        $data['incoming_documents']         = $this->get_receiver_incoming_documents();
        $user                               = DB::table('users')->where('user_id', session('_id'))->get()[0];
        $data['user_data']                  = array('user_id' => session('_id'), 'office_id' => $user->off_id );
        $data['final_actions']              = CustomModel::q_get($this->final_actions_table)->get();

       
        return view('dts.receiver.contents.incoming.incoming')->with($data);
    }

    public function get_receiver_incoming_documents(){

        $data = [];

        $rows = DocumentsModel::get_receiver_incoming_documents();
   
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
