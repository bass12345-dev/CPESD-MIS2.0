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
                  <th>#</th>
                  <th>Action</th>
                  <th>Date And Time</th>
               </tr>
            </thead>
           
         </table>
</div>

@endsection
@section('js')
<!-- @include('dts.includes.datatable') -->
<script>
   

document.addEventListener("DOMContentLoaded", function () {
   table = $("#datatables-buttons").DataTable({
      responsive: true,
      ordering: false,
      processing: true,
      pageLength: 25,
      language: {
         "processing": '<div class="d-flex justify-content-center "> <img class="top-logo mt-4" src="{{asset("assets/img/peso_logo.png")}}"></div>'
      },
      dom: 'Bfrtip',
      buttons: ['copy', 'print', 'csv'],
      ajax: {
         url: base_url + "/dts/us/my-action-logs",
         method: 'GET',
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
         },
         dataSrc: ""
      },
      columns: [
         {
         data: 'number',
      }, 
         {
         data: null,
      }, 
      {
         data: 'action_datetime'
      }, 
     
          ],
          columnDefs: [ 
            {
               targets: 1,
               data: null,
               render: function (data, type, row) {
                  return '<a href="' + base_url + '/dts/user/view?tn=' + row.tracking_number + '" data-toggle="tooltip" data-placement="top" title="View ' + row.tracking_number + ' ?>">' + row.action + '</a>';
               }
            },

           

   ]

   });
});
</script>
@endsection