<?php 
namespace App\Services;

use App\Repositories\dts\CustomRepository;
use App\Repositories\dts\DocumentRepository;
use Carbon\Carbon;
use DateTime;
class DocumentServices
{   
    protected $documentRepository;
    protected $customRepository;
    protected $actionLogService;
    protected $userService;
    protected $now;
    private $history_table              = "history";
    private $documents_table            = 'documents';
    private $users_table                = "users";
    public function __construct(DocumentRepository $documentRepository,CustomRepository $customRepository, ActionLogsService $actionLogService, UserService $userService)
    {
        $this->documentRepository   = $documentRepository;
        $this->customRepository     = $customRepository;
        $this->actionLogService     = $actionLogService;
        $this->userService          = $userService;
        $this->now =  Carbon::now();
    }


    public function complete_process($remarks,$final_action,$history_id,$tracking_number,$user_type){

        $hs                 = $this->customRepository->q_get_where_order($this->history_table,array('history_id' => $history_id),'history_id','desc')->first();
        $user_row           = $this->customRepository->q_get_where('users', array('user_id' => session('_id')))->first();

        if($user_row->user_id == 8 || $user_row->user_id == 13){

        $where              = array('history_id' => $history_id);
        $data               = array(
                            'status'            => 'received',
                            'received_status'   => 1,
                            'received_date'     =>  $hs->received_date == NULL ?   Carbon::now()->format('Y-m-d H:i:s') : $hs->received_date,
                            'release_status'    => 1,
                            'release_date'      =>  $hs->release_date == NULL ?   Carbon::now()->format('Y-m-d H:i:s')  : $hs->release_date,
        );
        $update             = $this->customRepository->update_item($this->history_table,$where,$data);

        if($update){

        $info = array(
            't_number'              => $tracking_number,
            'user1'                 => $user_row->user_id,
            'office1'               => $user_row->off_id,
            'user2'                 => $user_row->user_id,
            'office2'               => $user_row->off_id,
            'received_status'       => 1,
            'received_date'         => Carbon::now()->format('Y-m-d H:i:s') ,
            'release_status'        => NULL,
            'to_receiver'           => 'no',
            'release_date'          => Carbon::now()->format('Y-m-d H:i:s') ,
            'status'                => 'completed',
            'final_action_taken'    => $final_action,
            'remarks'               => $remarks

        );

        $add1 = $this->customRepository->insert_item($this->history_table, $info);

        if ($add1) {
            $query_row      = $this->customRepository->q_get_where($this->documents_table,array('tracking_number'=> $tracking_number))->first();
            $update_receive = $this->customRepository->update_item($this->documents_table,array('tracking_number', $tracking_number), array('doc_status' => 'completed','completed_on'=> Carbon::now()->format('Y-m-d H:i:s')));
            $this->actionLogService->dts_add_action('Completed Document No. '.$query_row->tracking_number,$user_type,$query_row->document_id);
            $data = array('message' => 'Completed Succesfully', 'response' => true);
        } else {

            $data = array('message' => 'Something Wrong', 'response' => false);

        }

        }else {
            $data = array('message' => 'Something Wrong', 'response' => false);
        }

    }else {
        $data = array('message' => 'Sorry !!!! You are not Authorized to use this action', 'response' => false);
    }


        return $data;
    }

    public function update_forwarded($request,$user_type){

        $id = $request->input('history_id');
        $tracking_number = $request->input('tracking_number');
        $forward_to = $request->input('forward') == 'fr' ? $this->get_receiver() : $request->input('forward');
        $is_yes = $request->input('forward') == 'fr' ? 'yes' : 'no';

        $r = $this->customRepository->q_get_where($this->documents_table, array('tracking_number' => $tracking_number))->first();
        $user_row = $this->customRepository->q_get_where($this->users_table, array('user_id' => $forward_to))->first();
        $update_release = $this->customRepository->update_item($this->history_table, array('history_id' => $id), array('user2' => $forward_to, 'to_receiver' => $is_yes));
        if ($update_release) {
            $this->actionLogService->dts_add_action(
                'Update Forwarded Document No. ' . $tracking_number . ' to ' . $this->userService->user_full_name($user_row),
                $user_type 
                ,
               $r->document_id
            );
            $data = array('message' => 'Updated Successfully', 'response' => true);
        } else {
            $data = array('message' => 'Something Wrong', 'response' => false);
        }

        return $data;
    }


    public function get_receiver()
    {

        $items = $this->customRepository->q_get_where($this->users_table, array('user_status' => 'active', 'is_receiver' => 'yes'))->first();
        return $items->user_id;
    }

    public function update_remarks($id,$remarks){

        $update_release = $this->customRepository->update_item($this->history_table, array('history_id' => $id), array('remarks' => $remarks));

        if ($update_release) {
            $data = array('message' => 'Remarks Updated Successfully', 'response' => true);
        } else {
            $data = array('message' => 'Something Wrong | Remarks is not updated', 'response' => false);
        }

        return $data;
    }

    public function cancel_documents($items,$user_type){

        $id         = $items['id'];
        $reason     = $items['reason'];
        $message    = '';
        $arr = array();
        if (is_array($id)) {
            foreach ($id as $row) {
                $items = array(
                    'doc_status'         => 'cancelled',
                    'note'               => $reason
                );

                $check = $this->customRepository->q_get_where($this->documents_table,array('document_id' => $row))->first();
                if($check->doc_status != 'completed'){
                    $this->customRepository->update_item($this->documents_table, array('document_id' => $row), $items);
                    $this->actionLogService->dts_add_action('Canceled Document No. '.$check->tracking_number,$user_type,$row);
                }else {
                    array_push($arr, $check->document_id);
                }
            }
            $message = count($arr) > 0 ? " Canceled Successfully | Some documents is cannot be cancelled because it's already completed or canceled already" : 'Canceled Succesfully';
            $data = array('message' => $message, 'response' => true);
        } else {
            $data = array('message' => 'Error', 'response' => false);
        }

        return $data;
    }


    //ADMIN SERVICE
    
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


  


    public function get_all_documents(){

        $rows               = $this->documentRepository->get_all_documents();
        $data = [];
        $i = 1;

        foreach ($rows as $value => $key) {
            $where                          = array('t_number' => $key->tracking_number);
            $delete_button                  = $this->customRepository->q_get_where($this->history_table, $where)->count() > 1 ? true : false;
            $status                         = $this->check_status($key->doc_status);
            $history                        = $this->customRepository->q_get_where_order($this->history_table, $where, 'history_id', 'desc');
            $is_existing                     = $history->count();
            $data[] = array(
                'number'                    => $i++,
                'tracking_number'           => $key->tracking_number,
                'document_name'             => $key->document_name,
                'type_name'                 => $key->type_name,
                'created'                   => date('M d Y - h:i a', strtotime($key->created)),
                'a'                         => $delete_button,
                'document_id'               => $key->document_id,
                'history_id'                => $is_existing == 0 ? '' : $this->customRepository->q_get_where_order($this->history_table, $where, 'history_id', 'desc')->get()[0]->history_id,
                'error'                     => $is_existing == 0 ? 'text-danger' : '',
                'user_id'                   => $key->u_id,
                'created_by'                => $key->first_name . ' ' . $key->middle_name . ' ' . $key->last_name . ' ' . $key->extension,
                'is'                        => $status,
                'history_status'            => $key->doc_status
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