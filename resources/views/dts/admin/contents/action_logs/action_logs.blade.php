@extends('dts.admin.layout.admin_master')
@section('title', $title)
@section('content')
@include('global_includes.title')
<div class="card flex-fill p-3">
        <div class="card-header">
            <h5 class="card-title mb-0">Action Logs</h5>
         </div>
         <table class="table table-hover  " id="datatables-buttons" style="width: 100%; "  >
            <thead>
               <tr>
                  <th>Name</th>
                  <th>Action</th>
                  <th>Type</th>
                  <th>Date And Time</th>
                  
               </tr>
            </thead>
            <tbody>
     
                  <?php
                   $i = 1;
                   foreach ($actions as $row) :?>
                     <tr>
                        <td>{{$row->first_name}} {{$row->middle_name}} {{$row->last_name}} {{$row->extension}}</td>
                        <td><a href="{{url('/dts/admin/view?tn='.$row->tracking_number)}}">{{$row->action}}</a></td>
                        <td><span class="badge bg-primary " style="font-size: 12px;">{{$row->user_type}}</span></td>
                        <td>{{ date('M d Y h:i A', strtotime($row->action_datetime)) }}</td>
                     </tr>
                <?php endforeach; ?>    
            
              
            </tbody>
         </table>
</div>

@endsection
@section('js')
@include('dts.includes.datatable')
@endsection