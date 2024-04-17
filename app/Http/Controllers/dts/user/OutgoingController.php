<?php

namespace App\Http\Controllers\dts\user;

use App\Http\Controllers\Controller;
use App\Models\DocumentsModel;
use Illuminate\Http\Request;

class OutgoingController extends Controller
{
    public function index(){
        $data['title'] = 'Outgoing Documents';
        return view('dts.users.contents.outgoing.outgoing')->with($data);
    }

    public function get_outgoing_documents(){

        $items = DocumentsModel::get_outgoing_documents();

        dd($items);
       
    }
}
