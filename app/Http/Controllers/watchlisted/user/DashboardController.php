<?php

namespace App\Http\Controllers\watchlisted\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomModel;

class DashboardController extends Controller
{
    private $person_table = 'persons';
    public function index(){
        
        $data['title']                      = 'User Watchlisted Dashboard';
        $data['count_approved']             = CustomModel::q_get_where($this->person_table,array('status' => 'active','added_by'=>session('watch_id')))->count();
        $data['count_pending']              = CustomModel::q_get_where($this->person_table,array('status' => 'inactive','added_by'=>session('watch_id')))->count();
        $data['barangay']                   = $this->per_barangay();
        return view('watchlisted.users.contents.dashboard.dashboard')->with($data);
       
    }


    function per_barangay(){
        $active     = array();
        $barangay   = config('app.barangay');

        foreach ($barangay as $row) {

            $count = CustomModel::q_get_where($this->person_table,array('status' => 'active', 'address' => $row))->count();
            array_push($active, $row.'  <span class="text-primary">('.$count.')</span>');

        }




        return $active;
    }

}
