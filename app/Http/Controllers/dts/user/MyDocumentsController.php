<?php

namespace App\Http\Controllers\dts\user;

use App\Http\Controllers\Controller;
use App\Http\Controllers\dts\admin\ActionLogsController;
use App\Models\DocumentsModel;
use App\Models\CustomModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;

class MyDocumentsController extends Controller
{
    private $history_table = "history";
    private $document_types_table = "document_types";
    private $documents_table = 'documents';
    private $users_table = "users";
    private $final_actions_table = "final_actions";
    private $office_table = 'offices';
    private $now;

    public function __construct()
    {
        $this->now = new \DateTime();
        $this->now->setTimezone(new \DateTimezone('Asia/Manila'));
    }
    public function index()
    {
        $data['title'] = 'My Documents';
        // $data['documents'] = $this->get_all_documents();
        $data['document_types'] = CustomModel::q_get_order($this->document_types_table, 'type_name', 'asc')->get();
        $data['offices'] = CustomModel::q_get_order($this->office_table, 'office', 'asc')->get();
        return view('dts.users.contents.my_documents.my_documents')->with($data);
    }


    public function get_my_documents(){

        $items = array();
        $rows = DocumentsModel::get_my_documents();
        $i = 1;
        foreach ($rows as $value => $key) {
    
                $delete_button = CustomModel::q_get_where($this->history_table, array('t_number' => $key->tracking_number))->count() > 1 ? true : false;
                $status = $this->check_status($key->doc_status);
    
                $items['data'][] = array(
                    'number' => $i++,
                    'tracking_number' => $key->tracking_number,
                    'document_name' => $key->document_name,
                    'type_name' => $key->type_name,
                    'created' => date('M d Y - h:i a', strtotime($key->d_created)),
                    'a' => $delete_button,
                    'document_id' => $key->document_id,
                    'is' => $status,
                    'doc_type' => $key->doc_type,
                    'description' => $key->document_description,
                    'destination_type' => $key->destination_type,
                    'doc_status' => $key->doc_status,
                    'name' => $key->name,
                    'document_type_name' => $key->type_name,
                    'encoded_by' => $key->first_name . ' ' . $key->middle_name . ' ' . $key->last_name . ' ' . $key->extension,
                    'origin' => $key->origin == NULL ? '-' : $key->origin,
                    'origin_id' => $key->origin_id
                );
        }

        return response()->json($items);
    }

    public function print_slips()
    {

        $arr = [];
        if (isset($_GET['ids'])) {
            $ids = $_GET['ids'];
            if ($ids != '') {
                $pieces = explode(",", $ids);
                foreach ($pieces as $row) {

                    $doc = DocumentsModel::get_document_where_id($row);
                    array_push($arr, $doc);


                }

            } else {
                abort(404);
            }
        } else {
            abort(404);
        }
        $data['data'] = $arr;


        return view('dts.includes.print.print_slip')->with($data);
    }



    // function get_all_documents()
    // {

    //     $rows = DocumentsModel::get_my_documents();
    //     $data = [];
    //     $i = 1;
    //     foreach ($rows as $value => $key) {

    //         $delete_button = CustomModel::q_get_where($this->history_table, array('t_number' => $key->tracking_number))->count() > 1 ? true : false;
    //         $status = $this->check_status($key->doc_status);

    //         $data[] = array(
    //             'number' => $i++,
    //             'tracking_number' => $key->tracking_number,
    //             'document_name' => $key->document_name,
    //             'type_name' => $key->type_name,
    //             'created' => date('M d Y - h:i a', strtotime($key->d_created)),
    //             'a' => $delete_button,
    //             'document_id' => $key->document_id,
    //             'is' => $status,
    //             'doc_type' => $key->doc_type,
    //             'description' => $key->document_description,
    //             'destination_type' => $key->destination_type,
    //             'doc_status' => $key->doc_status,
    //             'name' => $key->name,
    //             'document_type_name' => $key->type_name,
    //             'encoded_by' => $key->first_name . ' ' . $key->middle_name . ' ' . $key->last_name . ' ' . $key->extension,
    //             'origin' => $key->origin == NULL ? '-' : $key->origin,
    //             'origin_id' => $key->origin_id
    //         );
    //     }
    //     return $data;
    // }

    public static function check_status($doc_status)
    {
        $status = '';

        switch ($doc_status) {
            case 'completed':
                $status = '<span class="badge p-2 bg-success">Completed</span>';
                break;
            case 'pending':
                $status = '<span class="badge p-2 bg-danger">Pending</span>';
                break;

            case 'cancelled':
                $status = '<span class="badge p-2 bg-warning">Canceled</span>';
                break;
            
            case 'outgoing':
                    $status = '<span class="badge p-2 bg-secondary">Outgoing</span>';
                    break;
            default:
                # code...
                break;
        }

        return $status;
    }

    public function store(Request $request)
    {


        $items = array(

            'tracking_number' => $request->input('tracking_number'),
            'document_name' => trim($request->input('document_name')),
            'u_id' => base64_decode($request->input('user_id')),
            'offi_id' => $request->input('office_id'),
            'doc_type' => $request->input('document_type'),
            'document_description' => trim($request->input('description')),
            'created' => Carbon::now()->format('Y-m-d H:i:s'),
            'doc_status' => 'pending',
            'destination_type' => $request->input('type'),
            'origin' => $request->input('origin'),
        );


        $count = CustomModel::q_get_where($this->documents_table, array('tracking_number' => $items['tracking_number']))->count();

        if ($count == 0) {

            $add = CustomModel::insert_item($this->documents_table, $items);

            if ($add) {

                $row = CustomModel::q_get_where($this->documents_table, array('document_id' => DB::getPdo()->lastInsertId()))->first();
                $receiver = CustomModel::q_get_where($this->users_table, array('is_receiver' => 'yes'))->first();

                $items1 = array(
                    't_number' => $row->tracking_number,
                    'user1' => $row->u_id,
                    'office1' => $row->offi_id,
                    'user2' => $row->u_id,
                    'office2' => $row->offi_id,
                    'status' => 'received',
                    'received_status' => '1',
                    'received_date' => Carbon::now()->format('Y-m-d H:i:s'),
                    'release_status' => NULL,
                    'to_receiver' => 'no',
                    'release_date' => NULL,
                );
                $add1 = CustomModel::insert_item($this->history_table, $items1);

                if ($add1) {
                    // $this->create_qr_code($items['tracking_number']);
                    ActionLogsController::dts_add_action($action = 'Added Document No. ' . $row->tracking_number, $user_type = 'user', $_id = $row->document_id);
                    $data = array('id' => $row->document_id, 'message' => 'Added Successfully', 'response' => true);
                } else {

                    $data = array('message' => 'Something Wrong', 'response' => false);
                }
            } else {

                $data = array('message' => 'Something Wrong', 'response' => false);
            }

        } else {
            $data = array('message' => 'Tracking Number is Existing', 'response' => false);
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

            'document_name' => $request->input('document_name'),
            'doc_type' => $request->input('document_type'),
            'document_description' => trim($request->input('description')),
            'origin' => $request->input('origin')

        );
        $update = CustomModel::update_item($this->documents_table, array('tracking_number' => $id), $items);
        if ($update) {
            $query_row = CustomModel::q_get_where($this->documents_table, array('tracking_number' => $id))->first();
            ActionLogsController::dts_add_action($action = 'Updated Document No. ' . $id, $user_type = 'user', $_id = $query_row->document_id);
            $data = array('message' => 'updated Succesfully', 'response' => true);
        } else {

            $data = array('message' => 'Something Wrong/No Changes Apply ', 'response' => false);
        }
        return response()->json($data);
    }

    public function delete(Request $request)
    {

        $id = $request->input('id')['id'];
        $delete = CustomModel::q_get_where($this->documents_table, array('document_id' => $id));
        $tracking_number = $delete->get()[0]->tracking_number;

        if ($delete->delete()) {
            CustomModel::delete_item($this->history_table, array('t_number' => $tracking_number));
            ActionLogsController::dts_add_action($action = 'Deleted Document No. ' . $tracking_number, $user_type = 'user', $_id = $id);
            $data = array('message' => 'Deleted Succesfully', 'response' => true);
        } else {

            $data = array('message' => 'Error', 'response' => false);
        }

        return response()->json($data);
    }


    public function receive(Request $request)
    {
        $history_id = $request->input('id');
        $tracking_number = $request->input('tracking_number');
        $resp = $this->received_process($history_id,$tracking_number);
        return response()->json($resp);
    }

    public function receive_documents(Request $request)
    {
        $items = $request->input('id')['items'];

        
        if (is_array($items)) {

            foreach ($items as $row) {
                $x = explode('-', $row);
                $history_id = $x[0];
                $tracking_number = $x[1];
                $resp = $this->received_process($history_id,$tracking_number);
            }

        } else {
            $resp = array('message' => 'Error', 'response' => false);
        }
        return response()->json($resp);
    }


    private function received_process($history_id,$tracking_number){

                $to_update = array(

                    'status' => 'received',
                    'received_status' => 1,
                    'received_date' => Carbon::now()->format('Y-m-d H:i:s')
                );


                $r = CustomModel::q_get_where('documents', array('tracking_number' => $tracking_number))->first();

                if ($r->doc_status != 'cancelled') {

                    $update_receive = CustomModel::update_item($this->history_table, array('history_id' => $history_id), $to_update);
                    if ($update_receive) {

                        ActionLogsController::dts_add_action($action = 'Received Document No. ' . $tracking_number, $user_type = 'user', $_id = $r->document_id);
                        $data = array('message' => 'Received Succesfully', 'id' => $history_id, 'tracking_number' => $tracking_number, 'response' => true);
                    } else {
                        $data = array('message' => 'Something Wrong', 'response' => false);
                    }
                } else {
                    $data = array('message' => 'This Document is cancelled', 'response' => false);
                }
                return $data;

    }

    public function forward(Request $request)
    {

        //update history release_status to 1
        $history_id = $request->input('history_id');
        $tracking_number = $request->input('tracking_number');
        $remarks = $request->input('remarks');
        $user_id = $request->input('id');
        $forward = $request->input('forward');
        $resp               = $this->forward_process($remarks,$forward,$user_id,$history_id,$tracking_number);
        return response()->json($resp);
    }

    public function forward_documents(Request $request)
    {

        $items      = $request->input('history_track1');
        $remarks    = $request->input('remarks');
        $forward    = $request->input('forward1');
        $user_id    = session('_id');
        $array      = explode(',',$items);
        
        foreach ($array as $row) {

            $x                  = explode('-', $row);
            $history_id         = $x[0];
            $tracking_number    = $x[1];
            $resp               = $this->forward_process($remarks,$forward,$user_id,$history_id,$tracking_number);
           
        }

        return response()->json($resp);

    }


    private function forward_process($remarks,$forward,$user_id,$history_id,$tracking_number){

        $forward_to         = $forward == 'fr' ? $this->get_receiver() : $forward;
        $user_row           = CustomModel::q_get_where($this->users_table, array('user_id' => $user_id))->first();
        $forward_user_row   = CustomModel::q_get_where($this->users_table, array('user_id' => $forward_to))->first();
        $count              = CustomModel::q_get_where($this->history_table, array('t_number' => $tracking_number))->count();

        $r                  = CustomModel::q_get_where($this->documents_table, array('tracking_number' => $tracking_number))->first();
        
        if ($r->doc_status != 'cancelled') {

            $update_release = CustomModel::update_item($this->history_table, array('history_id' => $history_id, 'received_status' => 1), array('release_status' => 1));

            if ($update_release) {


                $info = array(
                    't_number'          => $tracking_number,
                    'user1'             => $user_id,
                    'office1'           => $user_row->off_id,
                    'user2'             => $forward_to,
                    'office2'           => $forward_user_row->off_id,
                    'status'            => 'torec',
                    'received_status'   => NULL,
                    'received_date'     => NULL,
                    'release_status'    => NULL,
                    'to_receiver'       => $forward == 'fr' ? 'yes' : 'no',
                    'release_date'      => Carbon::now()->format('Y-m-d H:i:s'),
                    'remarks'           => $remarks

                );


                $add1 = CustomModel::insert_item($this->history_table, $info);

                if ($add1) {
                    ActionLogsController::dts_add_action(
                        $action = 'Forwarded Document No. ' . $tracking_number . ' to ' . $forward_user_row->first_name . ' ' . $forward_user_row->middle_name . ' ' . $forward_user_row->last_name . ' ' . $forward_user_row->extension,
                        $user_type = 'user'
                        ,
                        $_id = $r->document_id
                    );
                    $data = array('message' => 'Forwarded Successfully', 'response' => true);
                } else {

                    $data = array('message' => 'Something Wrong', 'response' => false);
                }
            } else {

                $data = array('message' => 'Something Wrong', 'response' => false);
            }
        }
        else {
            $data = array('message' => 'This Document is cancelled', 'response' => false);
        }

        return $data;

    }

    public function update_forwarded(Request $request)
    {

        $id = $request->input('history_id');
        $tracking_number = $request->input('tracking_number');
        $forward_to = $request->input('forward') == 'fr' ? $this->get_receiver() : $request->input('forward');
        $is_yes = $request->input('forward') == 'fr' ? 'yes' : 'no';




        $r = CustomModel::q_get_where('documents', array('tracking_number' => $tracking_number))->first();
        $user_row = CustomModel::q_get_where($this->users_table, array('user_id' => $forward_to))->first();
        $update_release = CustomModel::update_item($this->history_table, array('history_id' => $id), array('user2' => $forward_to, 'to_receiver' => $is_yes));
        if ($update_release) {
            ActionLogsController::dts_add_action(
                $action = 'Update Forwarded Document No. ' . $tracking_number . ' to ' . $user_row->first_name . ' ' . $user_row->middle_name . ' ' . $user_row->last_name . ' ' . $user_row->extension,
                $user_type = 'user'
                ,
                $_id = $r->document_id
            );
            $data = array('message' => 'Updated Successfully', 'response' => true);
        } else {
            $data = array('message' => 'Something Wrong', 'response' => false);
        }
        return response()->json($data);
    }


    public function update_remarks(Request $request)
    {

        $id = $request->input('history_id');
        $remarks = $request->input('remarks_update');



        $update_release = CustomModel::update_item($this->history_table, array('history_id' => $id), array('remarks' => $remarks));

        if ($update_release) {
            $data = array('message' => 'Remarks Updated Successfully', 'response' => true);
        } else {
            $data = array('message' => 'Something Wrong | Remarks is not updated', 'response' => false);
        }
        return response()->json($data);
    }

    function get_receiver()
    {

        $items = CustomModel::q_get_where($this->users_table, array('user_status' => 'active', 'is_receiver' => 'yes'))->first();
        return $items->user_id;
    }

    public function cancel_document(Request $request)
    {


        $id = $request->input('id');
        $items = array(
            'doc_status' => 'cancelled',
        );
        $update = CustomModel::update_item($this->documents_table, array('document_id' => $id), $items);
        if ($update) {

            $data = array('message' => 'Cancelled Succesfully', 'response' => true);
        } else {

            $data = array('message' => 'Something Wrong/No Changes Apply ', 'response' => false);
        }
        return response()->json($data);
    }


    public function get_receiver_incoming()
    {
        $id = session('_id');
        $count = CustomModel::q_get_where($this->history_table, array('user2' => $id, 'received_status' => NULL, 'status' => 'torec', 'release_status' => NULL, 'to_receiver' => 'yes'))->count();
        return $count;

    }



    public function print_slip()
    {

        $id = $_GET['id'];

        $row = DocumentsModel::get_document_where($id);

        $document_name = $row->document_name;
        $tracking_number = $row->tracking_number;
        $type = $row->type_name;
        $created = date('M d Y - h:i a', strtotime($row->created));
        $name = $row->first_name . ' ' . $row->middle_name . ' ' . $row->last_name . ' ' . $row->extension;
        $description = $row->document_description;

        // PDF::AddPage('P',array(215.9,200));


        // PDF::AddPage('P',array(215.9,200));
        PDF::SetAuthor('Basil John C. Manabo');
        PDF::SetTitle('Print Document No.' . $tracking_number);
        PDF::SetSubject('DTS');
        PDF::SetKeywords('CPESD-MIS | Document Tracking System');


        PDF::AddPage('P', 'A4');

        PDF::SetMargins(5, 10, 5, true);

        // ---------------------------------------------------------

        // set font
        PDF::SetFont('helvetica', 'B', 20);


        PDF::Write(30, 'OCM-CPESD DTS', '', 0, 'C', false, 0, false, false, 0);




        PDF::Image("../storage/app/img/qr-code/20240205008.png", $x = 165, $y = 5, $w = 35, $h = 35, 'PNG');

        //Left Logo
        PDF::Image("../assets/img/oroquieta_logo-300x300.png", $x = 6, $y = 5, $w = 17, $h = 17, 'PNG');
        PDF::Image("../assets/img/peso_logo.png", $x = 25, $y = 5, $w = 17, $h = 17, 'PNG');

        PDF::Image("../assets/img/Bagong_Pilipinas_logo.png", $x = 6, $y = 23, $w = 18, $h = 17, 'PNG');
        PDF::Image("../assets/img/oroquieta_logo-300x300.png", $x = 25, $y = 23, $w = 17, $h = 17, 'PNG');



        //Right Logo




        PDF::SetFont('helvetica', '', 9);


        // -----------------------------------------------------------------------------




        // -----------------------------------------------------------------------------

        // NON-BREAKING ROWS (nobr="true")


        $tbl = '';

        //Break Line
        $tbl .= '

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
';

        $tbl .= '

<div>



<table border="1"  cellpadding="3" cellspacing="2" >

 <tr nobr="true">
  <th colspan="4" style="text-align:center;font-size: 15px;font-family: "Times New Roman", Times, serif; font-weight: bold;">Routing Slip</th>
 </tr>
 <tr>
				<th colspan="4" style="text-align:center; font-family: "Times New Roman", Times, serif; font-style: italic;font-size:8px;">Impt:All Simple transactions must be acted within 48 hours only</th>

			</tr>
 <tr  >
  <td colspan="3" height="40">
    
    <label style="font-size:10px;font-weight:bold;">Document Name : </label><span style="font-size:10px;">' . $document_name . '</span><br>
    <label style="font-size:10px;font-weight:bold;">Document No : </label><span style="font-size:10px;">' . $tracking_number . '</span><br>
    <label style="font-size:10px;font-weight:bold;">Document Type : </label><span style="font-size:10px;">' . $type . '</span><br>
    <label style="font-size:10px;font-weight:bold;">Date Received : </label><span style="font-size:10px;">' . $created . '</span><br>
  
  </td>
  
  <td colspan="1" height="40">
  <br>
  <br>
  <label style="font-size:10px;font-weight:bold;">Encoded By : </label><br>&nbsp; <span style="font-size:10px;">' . $name . '</span>

 
</td>

 </tr>

 
 <tr nobr="true"  >
 
  <td colspan="4" height="30"  >
    <br>
    <br>
    <label style="font-size:10px; font-weight:bold;">Brief Description</label> : <br><span style="font-size:10px;">' . $description . '</span>

  </td>

 </tr>

 <tr nobr="true"  >
 
  <td colspan="4" height="145">
    <h2 align="center">Action Taken</h2>
    
  </td>

 </tr>

</table>
<br>
<hr>


';




        // $style = array('width' => 0.5, 'dash' => '2,2,2,2', 'phase' => 0, 'color' => array(255, 0, 0));

        // PDF::Line(5, 20, 200, 20, $style);
        PDF::writeHTML($tbl, true, false, true, false, '');



        PDF::Output('example_048.pdf', 'I');
        // -----------------------------------------------------------------------------

        //Close and output PDF documentPDF::Output('example_048.pdf', 'I');

    }





}