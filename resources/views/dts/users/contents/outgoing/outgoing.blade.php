@extends('dts.users.layout.user_master')
@section('title', $title)
@section('content')

@include('global_includes.title')
<div class="row">
   <div class="col-md-12 col-12   ">
   @include('dts.users.contents.outgoing.sections.outgoing_table')
   </div>
</div>
@endsection
@section('js')
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
      
      
      ajax: {
         url: base_url + "/dts/us/g-o-d",
         method: 'GET',
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
         },
         dataSrc: ""
      },
   //    columns: [
   //       {
   //       data: 'number',
   //    }, 
   //    {
   //       data: null,
   //    }, 
   //    {
   //       data: 'name',
   //    }, 
   //    {
   //       data: 'document_number',
   //    }, 
   // ],
   //    columnDefs: [ 
   //          {
   //             targets: 1,
   //             data: null,
   //             render: function (data, type, row) {
   //                return '<a href="' + base_url + '/dts/user/view?tn=' + row.document_number + '" data-toggle="tooltip" data-placement="top" title="View ' + row.document_number + ' ?>">' + row.document_name + '</a>';
   //             }
   //          },

           

   // ]

   });
});
</script>
@endsection