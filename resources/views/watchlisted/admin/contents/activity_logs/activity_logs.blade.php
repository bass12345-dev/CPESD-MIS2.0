@extends('watchlisted.admin.layout.watchlisted_master')
@section('title', $title)
@section('content')
@include('global_includes.title')

<div class="card flex-fill p-3">
         <table class="table table-hover table-striped " id="datatables-buttons" style="width: 100%; "  >
            <thead>
               <tr>
                  <th></th>
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
                    <td>{{$i++}}</td>
                    <td>{{$row->first_name}} {{$row->middle_name}} {{$row->last_name}} {{$row->extension}}</td>
                    <td><a href="{{url('/watchlisted/admin/view_profile?id='.$row->person_id)}}">{{$row->action}}</a></td>
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
<script>

</script>
@endsection