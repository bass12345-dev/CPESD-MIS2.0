<?php

namespace App\Http\Controllers\dts\user;

use App\Http\Controllers\Controller;
use App\Http\Controllers\dts\admin\ActionLogsController;
use App\Models\DocumentsModel;
use App\Models\CustomModel;
use App\Repositories\dts\CustomRepository;
use App\Services\DocumentServices;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;

class MyDocumentsController extends Controller
{
    private $user_type                  = 'user';
    private $history_table              = "history";
    private $document_types_table       = "document_types";
    private $office_table               = 'offices';
    private $now;
    private $documentService;
    private $customRepository;
    public function __construct(DocumentServices $documentService, CustomRepository $customRepository)
    {
        $this->documentService = $documentService;
        $this->customRepository = $customRepository;
        $this->now = new \DateTime();
        $this->now->setTimezone(new \DateTimezone('Asia/Manila'));
    }
    public function index()
    {
        $data['title']          = 'My Documents';
        $data['document_types'] = CustomModel::q_get_order($this->document_types_table, 'type_name', 'asc')->get();
        $data['offices']        = CustomModel::q_get_order($this->office_table, 'office', 'asc')->get();
        return view('dts.users.contents.my_documents.my_documents')->with($data);
    }


    public function get_my_documents(){

        $items = $this->documentService->get_my_documents();
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

    public function store(Request $request)
    {
        $data = $this->documentService->add_document_process($request,$this->user_type);
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
        $data = $this->documentService->update_document_process($request,$this->user_type);
        return response()->json($data);
    }

    public function delete(Request $request)
    {
        $id = $request->input('id')['id'];
        $data = $this->documentService->delete_document_process($id,$this->user_type);
        return response()->json($data);
    }




    public function receive_documents(Request $request)
    {
        $items = $request->input('id')['items'];
        if (is_array($items)) {

            foreach ($items as $row) {
                $x = explode('-', $row);
                $history_id = $x[0];
                $tracking_number = $x[1];
                $resp = $this->documentService->received_process($history_id,$tracking_number,$this->user_type); 
            }
        } else {
            $resp = array('message' => 'Error', 'response' => false);
        }
        return response()->json($resp);
    }





    public function forward_documents(Request $request)
    {

        $items      = $request->input('history_track1');
        $remarks    = $request->input('remarks1');
        $forward    = $request->input('forward1');
        $user_id    = session('_id');
        $array      = explode(',',$items);
        
        foreach ($array as $row) {

            $x                  = explode('-', $row);
            $history_id         = $x[0];
            $tracking_number    = $x[1];
            $resp               = $this->documentService->forward_process($remarks,$forward,$user_id,$history_id,$tracking_number,$this->user_type);
           
        }

        return response()->json($resp);

    }





    public function complete_documents(Request $request){


        $items           = $request->input('c_t_number');
        $remarks         = $request->input('remarks2');
        $final_action    = $request->input('final_action_taken');
        $array           = explode(',',$items);
        $user_type       = 'user';
        
        foreach ($array as $row) {

            $x                  = explode('-', $row);
            $history_id         = $x[0];
            $tracking_number    = $x[1];
            $resp               = $this->documentService->complete_process($remarks,$final_action,$history_id,$tracking_number,$user_type);
           
        }

        return response()->json($resp);
        
    }


    public function update_forwarded(Request $request)
    {
        $resp = $this->documentService->update_forwarded($request,$this->user_type);
        return response()->json($resp);
    }


    public function update_remarks(Request $request)
    {
        $resp = $this->documentService->update_remarks($request,$this->user_type);
        return response()->json($resp);
    }

    public function cancel_documents(Request $request)
    {
        $resp  =  $this->documentService->cancel_documents($request,$this->user_type);
        return response()->json($resp);
    }


    public function get_receiver_incoming()
    {
        $id = session('_id');
        $count = $this->customRepository->q_get_where($this->history_table, array('user2' => $id, 'received_status' => NULL, 'status' => 'torec', 'release_status' => NULL, 'to_receiver' => 'yes'))->count();
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