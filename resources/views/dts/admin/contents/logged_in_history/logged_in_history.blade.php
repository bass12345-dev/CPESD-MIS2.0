@extends('dts.admin.layout.admin_master')
@section('title', $title)
@section('content')
@include('global_includes.title')
<div class="card flex-fill p-3">
        <div class="card-header">
            <h5 class="card-title mb-0">Logged In History</h5>
         </div>
         <table class="table table-hover  " id="datatables-buttons" style="width: 100%; "  >
            <thead>
               <tr>
                  <th >Name</th>
                  <th >Date And Time</th>
                  
               </tr>
            </thead>
            <tbody>
                  <?php
                   $i = 1;
                   foreach ($l_i_h as $row) :?>
                     <tr>
                        <td class="">{{$row->first_name}} {{$row->middle_name}} {{$row->last_name}} {{$row->extension}}</td>
                        <td class="">{{date('M d Y h:i a',strtotime($row->logged_in_date))}}</td>
                        
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