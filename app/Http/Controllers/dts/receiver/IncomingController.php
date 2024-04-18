<?php

namespace App\Http\Controllers\dts\receiver;
use App\Http\Controllers\Controller;
use App\Models\DocumentsModel;
use Illuminate\Support\Facades\DB;
use App\Models\CustomModel;
use Illuminate\Http\Request;

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
        $i = 1;
       foreach ($rows as $value => $key) {

          

            $data[] = array(
                    'number'            => $i++,
                    'tracking_number'   => $key->tracking_number,
                    'document_name'     => $key->document_name,
                    'type_name'         => $key->type_name,
                    'released_date'     => date('M d Y - h:i a', strtotime($key->release_date)) ,
                    'from'              => $key->first_name.' '.$key->middle_name.' '.$key->last_name.' '.$key->extension,
                    'document_id'       => $key->document_id,
                    'history_id'        => $key->history_id,
                    'remarks'           => $key->remarks,
                    'a'                 => $key->user_type == 'admin' ? true : false,
                    'note'              => empty($key->note) ? 'Empty Note' : $key->note
            );
        }

        return response()->json($data);
      }

    public function add_note(Request $request){

        $document_id    = $request->input('document_id');
        $note           = empty($request->input('note')) ? ' ' : $request->input('note');

        $update     = CustomModel::update_item('documents', array('document_id' => $document_id), array('note' => $note));

        if ($update) {
            $data = array('message' => 'Note Updated Successfully', 'response' => true);
        } else {
            $data = array('message' => 'Something Wrong | Note is not updated', 'response' => false);
        }
        return response()->json($data);

    }
}
