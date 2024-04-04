<?php

namespace App\Http\Controllers\dts\admin;

use App\Http\Controllers\Controller;
use App\Models\CustomModel;
use Illuminate\Http\Request;
use App\Models\DocumentsModel;
use Carbon\Carbon;
use DateTime;
class DashboardController extends Controller
{   
    private $document_table          = "documents";
    private $office_table            = "offices";
    private $document_types_table    = "document_types";
    private $users_table             = "users";
    private $final_actions_table     = "final_actions";
    private $logged_in_history      = 'logged_in_history';
    
    private $date_now;

    public function __construct(){
        $this->date_now = Carbon::now()->format('Y-m-d H:i:s');
    }
    public function index()
    {
        $data['title'] = 'Admin Dashboard';
        $data['count'] = $this->count_menu_data();
        $data['today'] = Carbon::now()->format('M d Y');
        $data['inactive']   =  $this->calculate_inactive_logged();
        return view('dts.admin.contents.dashboard.dashboard')->with($data);
    }

    public function count_menu_data()
    {
        $date_now = Carbon::now()->format('Y-m-d');
        $data = array(

            'count_documents'       => CustomModel::q_get($this->document_table)->count(),
            'count_offices'         => CustomModel::q_get_where($this->office_table,array('office_status' => 'active'))->count(),
            'count_document_types'  => CustomModel::q_get($this->document_types_table)->count(),
            'count_users'           => CustomModel::q_get_where($this->users_table,array('user_status'=>'active'))->count(),
            'final_actions'         => CustomModel::q_get($this->final_actions_table)->count(),
            'pending'               => CustomModel::q_get_where($this->document_table,array('doc_status' => 'pending'))->count(),
            'completed'             => CustomModel::q_get_where($this->document_table,array('doc_status' => 'completed'))->count(),
            'cancelled'             => CustomModel::q_get_where($this->document_table,array('doc_status' => 'cancelled'))->count(),
            'added_today'           => DocumentsModel::added_document_date_now($date_now),
            'completed_today'       => DocumentsModel::completed_document_date_now($date_now),
            'latest'                => DocumentsModel::get_all_documents_with_limit('10')

        );

        return $data;
    }



    function calculate_inactive_logged(){
        //get users
        $users = CustomModel::q_get_where($this->users_table,array('user_status'=>'active'))->get();
        //store results
        $result = array();
        foreach($users as $row){
            $query_history =  CustomModel::q_get_where_order($this->logged_in_history, array('user_id' => $row->user_id),'logged_in_history_id','desc');
            if($query_history->count() > 0){
                $get_history = $query_history->get()[0];
                $date_now_              = new DateTime($this->date_now);
                $logged_in_date         = new DateTime($get_history->logged_in_date);
                //Difference Between Two Dayas
                $interval               = $date_now_->diff($logged_in_date);
                //Count Days
                $count_days = $interval->d;
                $name = $count_days  > 1 ?  array_push($result,$row->first_name.' is '.$count_days.' days Inactive'):  false;
            }else {

                array_push($result,$row->first_name.' - walay open2x sa iyang account');
            }

            
        }

        return $result;
    }
}
