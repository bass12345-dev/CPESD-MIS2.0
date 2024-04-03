<?php

namespace App\Http\Controllers\dts\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\dts\user\MyDocumentsController;
use App\Models\CustomModel;
use App\Models\DocumentsModel;
use Illuminate\Http\Request;
use DateTime;

class ViewDocumentController extends Controller
{
    public $documents_table = "documents";
    public $history_table = "history";
    public function index()
    {
        $tn = $_GET['tn'];
        $check = CustomModel::q_get_where($this->documents_table, array('tracking_number' => $tn))->count();
        if ($check > 0) {
            $data['title'] = 'Document #' . $tn;
            $data['doc_data'] = $this->get_document_data($tn);
            $data['history'] = $this->get_history($tn);

          
            return view('dts.admin.contents.view.view')->with($data);
        } else {

            return redirect('/dts/admin/all-documents');
        }
    }

    function get_document_data($tn)
    {

        $row = DocumentsModel::get_document_data($tn);

        $data = array(

            'document_name'         => $row->document_name,
            'tracking_number'       => $row->tracking_number,
            'encoded_by'            => $row->first_name . ' ' . $row->middle_name . ' ' . $row->last_name . ' ' . $row->extension,
            'office'                => $row->office,
            'document_type'         => $row->type_name,
            'type_id'               => $row->type_id,
            'description'           => $row->document_description,
            'qr'                    => env('APP_URL') . '/storage/app/img/qr-code/' . $row->tracking_number . '.png',
            'status'                => MyDocumentsController::check_status($row->doc_status) ,
            'destination_type'      => $row->destination_type



        );

        return $data;
    }


    public function search(){
       
        $search = trim($_GET['q']);
        $docs = DocumentsModel::Adminsearch($search);
        return response()->json($docs);
    }



    public static function get_history($tn)
    {
        $history                    = DocumentsModel::get_history($tn);
        $data                       = [];

        foreach ($history->get() as $value => $row) {

            $where1                 = array('user_id' => $row->user1);
            $user1                  = DocumentsModel::history_user_data($where1);

            $where2                 = array('user_id' => $row->user2);
            $user2                  = DocumentsModel::history_user_data($where2);


            $date1                  = new DateTime($row->received_date);
            $date2                  = $row->release_date == NULL ? new DateTime($row->received_date) : new DateTime($row->release_date);
            $interval               = $date1->diff($date2);



            $min_ext                = $interval->i > 1 ? 'minutes' : 'minute';
            $hour_ext               = $interval->h > 1 ? 'hours' : 'hour';
            $days_ext               = $interval->d > 1 ? 'days' : 'day';
            $month_ext              = $interval->m > 1 ? 'months' : 'month';


            $display_month          = $interval->m == 0 ? ' ' : $interval->m . ' ' . $month_ext . ', ';
            $display_day            = $interval->d == 0 ? ' ' : $interval->d . ' ' . $days_ext . ', ';
            $display_hour           = $interval->h == 0 ? ' ' : $interval->h . ' ' . $hour_ext . ', ';
            $display_min            = $interval->i == 0 ? ' ' : $interval->i . ' ' . $min_ext;

            $data[] = array(

                'user1'                 => $row->release_date != NULL ? $user1[0]->first_name . ' ' . $user1[0]->middle_name . ' ' . $user1[0]->last_name : ' - ',
                'office1'               => $user1[0]->office,
                'user2'                 => $row->user2 != 0 ? $user2[0]->first_name . ' ' . $user2[0]->middle_name . ' ' . $user2[0]->last_name : ' - ',
                'office2'               => $row->user2 != 0 ? $user2[0]->office : ' - ',
                'tracking_number'       => $row->t_number,
                'date_released'         => $row->release_date != NULL ? date('M d Y', strtotime($row->release_date)) . ' - ' . date('h:i a', strtotime($row->release_date)) : ' - ',
                'date_received'         => $row->received_date != NULL ? date('M d Y', strtotime($row->received_date)) . ' - ' . date('h:i a', strtotime($row->received_date)) : ' - ',
                // 'duration' => $row['received_date'] != '0000-00-00 00:00:00' ?   $this->duration($interval) : ' - ',


                'duration'              => $row->received_date != NULL ? $display_month . ' ' . $display_day . ' ' . $display_hour . ' ' . $display_min : ' - ',
                'remarks'               => empty($row->remarks) ? 'no remarks' : $row->remarks,
                'final_action_taken'    => $row->action_name
            );

        }




        return $data;

    }
}
