<?php

namespace App\Http\Controllers\dts\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\dts\user\MyDocumentsController;
use App\Models\CustomModel;
use App\Models\DocumentsModel;
use App\Services\DocumentServices;
use App\Services\UserService;
use Illuminate\Http\Request;
use DateTime;

class ViewDocumentController extends Controller
{
    private $documents_table = "documents";
    private $history_table = "history";
    protected $DocumentService;
    public function __construct(DocumentServices $DocumentService){
        $this->DocumentService = $DocumentService;
    }
    public function index()
    {
        $tn = $_GET['tn'];
        $check = CustomModel::q_get_where($this->documents_table, array('tracking_number' => $tn))->count();
        if ($check > 0) {
            $data['title']          = 'Document #' . $tn;
            $data['doc_data']       = $this->DocumentService->get_document_data($tn);
            $data['history']        = $this->DocumentService->get_document_history($tn);
            return view('dts.admin.contents.view.view')->with($data);
        } else {

            return redirect('/dts/admin/all-documents');
        }
    }

    public function search(){
       
        $search = trim($_GET['q']);
        $docs = DocumentsModel::Adminsearch($search);
        return response()->json($docs);
    }

}
