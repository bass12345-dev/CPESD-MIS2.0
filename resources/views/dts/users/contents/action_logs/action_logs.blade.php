@extends('dts.users.layout.user_master')
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
                  <th>Action</th>
                  <th>Date And Time</th>
               </tr>
            </thead>
            <tbody>
     
                  <?php
                   $i = 1;
                   foreach ($actions as $row) :?>
                     <tr>
                        <td><a href="{{url('/dts/user/view?tn='.$row->tracking_number)}}">{{$row->action}}</a></td>
                        <td>{{ date('M d Y h:i A', strtotime($row->action_datetime)) }}</td>
                     </tr>
                <?php endforeach; ?>    
            
              
            </tbody>
         </table>
</div>

@endsection
@section('js')
<script>
</script>
@endsection