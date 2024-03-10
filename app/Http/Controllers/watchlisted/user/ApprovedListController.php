<?php

namespace App\Http\Controllers\watchlisted\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomModel;

class ApprovedListController extends Controller
{

    private $person_table = 'persons';
    public function index(){

        $data['title']          = 'Approved List';
        $data['approved']        = CustomModel::q_get_where_order($this->person_table,array('added_by' => session('watch_id'),'status'=>'active'),'created_at','desc')->get();
        return view('watchlisted.users.contents.approved_list.approved')->with($data);
    }
}
