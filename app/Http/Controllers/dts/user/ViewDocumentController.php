<?php

namespace App\Http\Controllers\dts\user;

use App\Http\Controllers\Controller;
use App\Models\CustomModel;
use App\Models\DocumentsModel;
use App\Repositories\dts\CustomRepository;
use App\Repositories\dts\DocumentRepository;
use Illuminate\Http\Request;
use App\Services\DocumentServices;
use DateTime;

class ViewDocumentController extends Controller
{
    private     $documents_table = "documents";
    protected   $DocumentService;
    protected   $customRepository;
    protected   $documentRepository;
    public function __construct(DocumentServices $DocumentService, CustomRepository $customRepository, DocumentRepository $documentRepository){
        $this->DocumentService      = $DocumentService;
        $this->customRepository     = $customRepository;
        $this->documentRepository  = $documentRepository;
    }
    public function index()
    {

        $tn                         = $_GET['tn'];
        $check                      = $this->customRepository->q_get_where($this->documents_table, array('tracking_number' => $tn))->count();
        if ($check > 0) {

            $data['title']                  = 'Document #' . $tn;
            $data['doc_data']               = $this->DocumentService->get_document_data($tn);
            $data['history']                = $this->DocumentService->get_document_history($tn);
            $data['outgoing_history']       = $this->documentRepository->get_outgoing_history($tn);
            return view('dts.users.contents.track.track')->with($data);
        } else {
            echo '<script>alert("Tracking Number Not Found")
                history.back();
         </script>';

        }
    }

    public function search(){
       
        $search = trim($_GET['q']);
        $docs = $this->documentRepository->search($search);
        return response()->json($docs);
    }


  
}
