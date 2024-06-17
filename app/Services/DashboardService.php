<?php 
namespace App\Services;

use App\Repositories\dts\AdminRepository;
use App\Repositories\dts\CustomRepository;
use Carbon\Carbon;
class DashboardService
{   
    protected $customRepository;
    protected $adminRepository;
    protected $doc_types_table = "document_types";
    protected $documents_table = "documents";
    protected $now;
    public function __construct(CustomRepository $customRepository, AdminRepository $adminRepository)
    {
        $this->customRepository     = $customRepository;
        $this->adminRepository      = $adminRepository;
        $this->now                  =  Carbon::now();
    }
    
    public function count_documents_by_types($year){
        
        $item_types         =  $this->customRepository->q_get($this->doc_types_table)->get();
        $count_documents    = array();
        $label              = array();

        foreach ($item_types as $row) {
            $count          = $this->adminRepository->get_documents_where_and_year($this->documents_table,array('doc_type' => $row->type_id),'created',$year)->count();
            array_push($count_documents, $count);
            array_push($label,$row->type_name);
        }

        $data['count_documents']    = $count_documents;
        $data['label']              = $label;

        return $data;
        
    }


    public function count_documents_per_month($year){

        $months           = array();
        $completed        = array();
        $pending          = array();
        $cancelled        = array();

        for ($m = 1; $m <= 12; $m++) {

            $completed_doc          =  $this->adminRepository->get_documents_where_and_year_and_month($this->documents_table,array('doc_status' => 'completed'),'created',$year,$m)->count();
            $pending_doc            =  $this->adminRepository->get_documents_where_and_year_and_month($this->documents_table,array('doc_status' => 'pending'),'created',$year,$m)->count();
            $cancelled_doc          =  $this->adminRepository->get_documents_where_and_year_and_month($this->documents_table,array('doc_status' => 'cancelled'),'created',$year,$m)->count();
            $month                          =  date('M', mktime(0, 0, 0, $m, 1));
            array_push($months, $month);
            array_push($completed, $completed_doc);
            array_push($cancelled, $cancelled_doc);
            array_push($pending, $pending_doc);
        }
        $data['label']                      = $months;
        $data['data_pending']               = $pending;
        $data['data_completed']             = $completed;
        $data['data_cancelled']             = $cancelled;
       
        return $data;

        
    }



}