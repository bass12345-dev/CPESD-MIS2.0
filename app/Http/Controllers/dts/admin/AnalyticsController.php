<?php

namespace App\Http\Controllers\dts\admin;

use App\Http\Controllers\Controller;
use App\Services\DashboardService;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    protected $DashboardService;
    public function __construct(DashboardService $dashboardService){
        $this->DashboardService = $dashboardService;
    }
    public function index(){
        $data['title'] = 'Analytics ';
        return view('dts.admin.contents.analytics.analytics')->with($data);

    }

    public function document_types_analytics(Request $request){
        
        $year = $request->input('year');
        $data = $this->DashboardService->count_documents_by_types($year);
        return response()->json($data);
        
    }

    public function per_month_analytics(Request $request){
        
        $year = $request->input('year');
        $data = $this->DashboardService->count_documents_per_month($year);
        return response()->json($data);
        
    }
}
