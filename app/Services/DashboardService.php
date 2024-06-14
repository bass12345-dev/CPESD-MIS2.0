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



}