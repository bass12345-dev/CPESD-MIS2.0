<?php 
namespace App\Services;

use App\Repositories\dts\AdminRepository;
use Carbon\Carbon;
class LoginHistoryServices
{   
    protected $adminRepository;
    protected $now;
    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
        $this->now =  Carbon::now();
    }
    
    public function AllLoginHistory($month,$year){

       if($month == '' && $year == ''){
            $items =  $this->adminRepository->get_logged_in_history();
       }else {
            $items =  $this->adminRepository->get_logged_in_history_by_month($month,$year);
       }
       $i = 1;
       $data = [];
       foreach ($items as $value => $key) {
        $data[] = array(
            'number'            => $i++,
            'name'              => $key->first_name . ' ' . $key->middle_name . ' ' . $key->last_name . ' ' . $key->extension,
            'datetime'   => date('M d Y h:i a',strtotime($key->logged_in_date))
            
        );
    }

    return $data;
        
    }

}