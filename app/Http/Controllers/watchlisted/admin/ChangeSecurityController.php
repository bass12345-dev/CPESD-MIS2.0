<?php

namespace App\Http\Controllers\Watchlisted\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChangeSecurityController extends Controller
{
    public function index(){
        $data['title'] = 'Change Security Code';
        $data['watch_id'] = base64_encode(session('watch_id'));
        return view('watchlisted.admin.contents.change_code.change_code')->with($data);
    }
}
