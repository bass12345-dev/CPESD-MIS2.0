<?php

namespace App\Http\Controllers\dts\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OutgoingController extends Controller
{
    public function index(){
        $data['title'] = 'Outgoing Documents';
        // $data['incoming_documents']	= $this->get_incoming_documents();
        return view('dts.users.contents.outgoing.outgoing')->with($data);
    }
}
