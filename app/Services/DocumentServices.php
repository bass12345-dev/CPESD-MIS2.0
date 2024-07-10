<?php 
namespace App\Services;

use App\Repositories\dts\DocumentRepository;
use Carbon\Carbon;
use DateTime;
class DocumentServices
{   
    protected $documentRepository;
    protected $now;
    public function __construct(DocumentRepository $documentRepository)
    {
        $this->documentRepository = $documentRepository;
        $this->now =  Carbon::now();
    }
    
    public function get_document_data($tn){

        $row =  $this->documentRepository->get_document_data($tn);
        $data = array(
            'document_name'         => $row->document_name,
            'tracking_number'       => $row->tracking_number,
            'encoded_by'            => UserService::user_full_name($row),
            'office'                => $row->office,
            'document_type'         => $row->type_name,
            'type_id'               => $row->type_id,
            'description'           => $row->document_description,
            'qr'                    => env('APP_URL') . '/storage/app/img/qr-code/' . $row->tracking_number . '.png',
            'status'                => $this->check_status($row->doc_status),
            'destination_type'      => $row->destination_type
        );
        return $data;
    }


    
    public function get_document_history($tn){

        $history                    = $this->documentRepository->get_document_history($tn);
        $data                       = [];

        foreach ($history->get() as $value => $row) {

            $where1                 = array('user_id' => $row->user1);
            $user1                  = $this->documentRepository->history_user_data($where1);

            $where2                 = array('user_id' => $row->user2);
            $user2                  = $this->documentRepository->history_user_data($where2);



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

            $user__2                = $user2[0]->is_receiver == 'yes' ? 'final' : UserService::user_full_name($user2[0]);


            $data[] = array(

                'user1'                 => $row->release_date != NULL ? UserService::user_full_name($user1[0]) : ' - ',
                'office1'               => $user1[0]->office,
                'user2'                 => $row->user2 != 0 ?  $user__2 : ' - ',
                'office2'               => $row->user2 != 0 ? $user2[0]->office : ' - ',
                'tracking_number'       => $row->t_number,
                'date_released'         => $row->release_date != NULL ? date('M d Y', strtotime($row->release_date)) . ' - ' . date('h:i a', strtotime($row->release_date)) : ' - ',
                'date_received'         => $row->received_date != NULL ? date('M d Y', strtotime($row->received_date)) . ' - ' . date('h:i a', strtotime($row->received_date)) : ' - ',
                'duration'              => $row->received_date != NULL ? $display_month . ' ' . $display_day . ' ' . $display_hour . ' ' . $display_min : ' - ',
                'remarks'               => empty($row->remarks) ? 'no remarks' : $row->remarks,
                'final_action_taken'    => $row->action_name
            );

        }

        return $data;
    }



    public function check_status($doc_status)
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

}