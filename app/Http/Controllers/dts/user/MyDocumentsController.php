<?php

namespace App\Http\Controllers\dts\user;

use App\Http\Controllers\Controller;
use App\Models\DocumentsModel;
use App\Models\CustomModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class MyDocumentsController extends Controller
{
    public  $history_table        = "history";
    public  $document_types_table        = "document_types";
    public  $documents_table      = 'documents';
    public  $users_table          = "users";
    public  $final_actions_table = "final_actions";
    public  $now;
    public function __construct()
    {
        $this->now = new \DateTime();
        $this->now->setTimezone(new \DateTimezone('Asia/Manila'));
    }
    public function index()
    {
        $data['title'] = 'My Documents';
        $data['documents'] = $this->get_all_documents();
        $data['document_types'] = CustomModel::q_get_order($this->document_types_table, 'type_name', 'asc')->get();
        return view('dts.users.contents.my_documents.my_documents')->with($data);

    }

    function get_all_documents()
    {

        $rows   = DocumentsModel::get_my_documents();
        $data   = [];
        $i      = 1;
        foreach ($rows as $value => $key) {

            $delete_button  = CustomModel::q_get_where($this->history_table, array('t_number' => $key->tracking_number))->count() > 1 ? true : false;
            $status         = (CustomModel::q_get_where($this->history_table, array('t_number' => $key->tracking_number, 'status' => 'completed'))->count() == 1) ? '<span class="badge p-2 bg-success">Completed</span>' : '<span class="badge p-2 bg-danger">Pending</span>';

            $data[] = array(
                'number'                       => $i++,
                'tracking_number'              => $key->tracking_number,
                'document_name'                => $key->document_name,
                'type_name'                    => $key->type_name,
                'created'                      => date('M d Y - h:i a', strtotime($key->d_created)),
                'a'                            => $delete_button,
                'document_id'                  => $key->document_id,
                'is'                           => $status,
                'doc_type'                     => $key->doc_type,
                'description'                  => $key->document_description,
                'destination_type'             => $key->destination_type
            );
        }
        return $data;
    }

    public function store(Request $request)
    {

       
        $items = array(

            'tracking_number'                   => $request->input('tracking_number'),
            'document_name'                     => $request->input('document_name'),
            'u_id'                              => base64_decode($request->input('user_id')),
            'offi_id'                           => $request->input('office_id'),
            'doc_type'                          => $request->input('document_type'),
            'document_description'              => $request->input('description'),
            'created'                           => Carbon::now()->format('Y-m-d H:i:s') ,
            'doc_status'                        => 'pending',
            'destination_type'                  => $request->input('type'),
        );



        

        $add = CustomModel::insert_item($this->documents_table, $items);

        if ($add) {

            $row = CustomModel::q_get_where($this->documents_table, array('document_id' => DB::getPdo()->lastInsertId()))->first();
            $receiver = CustomModel::q_get_where($this->users_table, array('is_receiver' => 'yes'))->first();

            $items1 = array(
                't_number'                     => $row->tracking_number,
                'user1'                        => $row->u_id,
                'office1'                      => $row->offi_id,
                'user2'                        => $row->u_id,
                'office2'                      => $row->offi_id,
                'status'                       => 'received',
                'received_status'              => '1',
                'received_date'                => Carbon::now()->format('Y-m-d H:i:s') ,
                'release_status'               => NULL,
                'to_receiver'                  => 'no',
                'release_date'                 => NULL,
            );



            $items2 = array(
                't_number'                     => $row->tracking_number,
                'user1'                        => $row->u_id,
                'office1'                      => $row->offi_id,
                'user2'                        => $receiver->user_id,
                'office2'                      => $row->offi_id,
                'status'                       => 'torec',
                'received_status'              => NULL,
                'received_date'                => NULL,
                'release_status'               => NULL,
                'to_receiver'                  => 'yes',
                'release_date'                 =>  Carbon::now()->format('Y-m-d H:i:s') ,
                'remarks'                      => ''

            );


            $add1 = CustomModel::insert_item($this->history_table, $items1);

            if ($add1) {

                if ($row->destination_type == 'simple') {
                    CustomModel::insert_item($this->history_table, $items2);
                }

                $this->create_qr_code($items['tracking_number']);

                $data = array('message' => 'Added Successfully', 'response' => true);

            } else {

                $data = array('message' => 'Something Wrong', 'response' => false);
            }



        } else {

            $data = array('message' => 'Something Wrong', 'response' => false);


        }

        return response()->json($data);

    }


    private function create_qr_code($tracking_number)
    {


        $from = [255, 0, 0];
        $to = [0, 0, 255];
        $path = '/img/qr-code/';
        $image = QrCode::size(200)
            ->format('png')
            // ->merge('/storage/app/peso_logo.png')
            ->errorCorrection('M')
            // ->style('dot')
            // ->eye('circle')
            // ->gradient($from[0], $from[1], $from[2], $to[0], $to[1], $to[2], 'diagonal')
            // ->margin(0)
            ->generate(
                $tracking_number,
            );


        $output_file = $path . $tracking_number . '.png';
        Storage::disk('local')->put($output_file, $image);


    }

    public function update(Request $request)
    {

        $id = $request->input('t_number');
        $items = array(

            'document_name'         => $request->input('document_name'),
            'doc_type'              => $request->input('document_type'),
            'document_description'  => $request->input('description'),

        );
        $update = CustomModel::update_item($this->documents_table, array('tracking_number' => $id), $items);
        if ($update) {


            $data = array('message' => 'updated Succesfully', 'response' => true);


        } else {

            $data = array('message' => 'Something Wrong/No Changes Apply ', 'response' => false);

        }
        return response()->json($data);
    }

    public function delete(Request $request)
    {

        $id                 = $request->input('id')['id'];
        $delete             = CustomModel::q_get_where($this->documents_table, array('document_id' => $id));
        $tracking_number    = $delete->get()[0]->tracking_number;
        
        if ($delete->delete()) {
            CustomModel::delete_item($this->history_table, array('t_number' => $tracking_number));
            $data = array('message' => 'Deleted Succesfully', 'response' => true);
        } else {

            $data = array('message' => 'Error', 'response' => false);
        }

        return response()->json($data);
    }


    public function receive(Request $request){
        $id     = $request->input('id');
        $items  = array(
            
            'status'            => 'received',
            'received_status'   => 1, 
            'received_date'     => Carbon::now()->format('Y-m-d H:i:s')
        );
        $update_receive = CustomModel::update_item($this->history_table,array('history_id' => $id),$items);
         if($update_receive) {
            $data = array('message' => 'Received Succesfully' , 'response' => true );
        }else {
            $data = array('message' => 'Something Wrong' , 'response' => false );
        }
        return response()->json($data);
    }

    public function forward(Request $request)
    {

        //update history release_status to 1
        $id                 = $request->input('history_id');
        $tracking_number    = $request->input('tracking_number');
        $remarks            = $request->input('remarks');
        $forward_to         = $request->input('forward') == 'fr' ? $this->get_receiver() : $request->input('forward');
        $user_id            = $request->input('id');

        $f                  = $request->input('forward');

        $user_row           = CustomModel::q_get_where($this->users_table, array('user_id' => $user_id))->get();
        $forward_user_row   = CustomModel::q_get_where($this->users_table, array('user_id' => $forward_to))->get();
        $count              = CustomModel::q_get_where($this->history_table, array('t_number' => $tracking_number))->count();
        $update_release     = CustomModel::update_item($this->history_table, array('history_id' => $id, 'received_status' => 1), array('release_status' => 1));

        if ($update_release) {


            $info = array(
                't_number'                  => $tracking_number,
                'user1'                     => $user_id,
                'office1'                   => $user_row[0]->off_id,
                'user2'                     => $forward_to,
                'office2'                   => $forward_user_row[0]->off_id,
                'status'                    => 'torec',
                'received_status'           => NULL,
                'received_date'             => NULL,
                'release_status'            => NULL,
                'to_receiver'               => $f == 'fr' ? 'yes' : 'no',
                'release_date'              => Carbon::now()->format('Y-m-d H:i:s') ,
                'remarks'                   => $remarks

            );


            $add1 = CustomModel::insert_item($this->history_table, $info);
            
            if ($add1) {

                $data = array('message' => 'Forwarded Successfully', 'response' => true);

            } else {

                $data = array('message' => 'Something Wrong', 'response' => false);
            }

        } else {

            $data = array('message' => 'Something Wrong', 'response' => false);

        }

        return response()->json($data);

    }
    
    public function update_forwarded(Request $request){

        $id                 = $request->input('history_id');
        $forward_to         = $request->input('forward') == 'fr' ? $this->get_receiver() : $request->input('forward');



        $update_release     = CustomModel::update_item($this->history_table, array('history_id' => $id), array('user2'=> $forward_to));
    
        if ($update_release) {
                $data = array('message' => 'Updated Successfully', 'response' => true);   
        } else {
            $data = array('message' => 'Something Wrong', 'response' => false);
        }
        return response()->json($data);

    }


    public function update_remarks(Request $request){

        $id                 = $request->input('history_id');
        $remarks            = $request->input('remarks_update');



        $update_release     = CustomModel::update_item($this->history_table, array('history_id' => $id), array('remarks'=> $remarks));
    
        if ($update_release) {
                $data = array('message' => 'Remarks Updated Successfully', 'response' => true);   
        } else {
            $data = array('message' => 'Something Wrong | Remarks is not updated', 'response' => false);
        }
        return response()->json($data);

    }

    function get_receiver(){

        $items = CustomModel::q_get_where($this->users_table,array('user_status' => 'active', 'is_receiver' => 'yes'))->first();
        return $items->user_id;

   }

    
}
