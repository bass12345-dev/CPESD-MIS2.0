<?php 
namespace App\Services;

use App\Repositories\dts\AdminRepository;
use Carbon\Carbon;
class ActionLogsService
{   
    protected $adminRepository;
    protected $now;
    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
        $this->now =  Carbon::now();
    }

    public function AllActionLogs($month,$year){

       if($month == '' && $year == ''){
            $items =  $this->adminRepository->get_actions_dts();
       }else {
            $items           =  $this->adminRepository->get_actions_dts_by_month($month,$year);
       }
       $i                    = 1;
       $data = [];
       foreach ($items as $value => $key) {
        $data[] = array(
            'number'            => $i++,
            'name'              => $key->first_name . ' ' . $key->middle_name . ' ' . $key->last_name . ' ' . $key->extension,
            'user_type'         => $key->user_type,
            'tracking_number'   => $key->tracking_number,
            'action'            => $key->action,
            'action_datetime'   => date('M d Y h:i A', strtotime($key->action_datetime))
            
        );
    }

    return $data;

    }

}