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
@include('dts.includes.datatable_with_select')
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
      columns: [
         {
         data: 'doc_id',
      }, 
         {
         data: 'number',
      }, 
      {
         data: 'tracking_number',
      }, 
      {
         data: null,
      }, 
      {
         data: 'name',
      }, 
      {
         data: 'type_name',
      }, 
      {
         data: 'remarks',
      }, 
      {
         data: 'outgoing_date',
      }, 
   ],
   'select': {
         'style': 'multi',
      },
      columnDefs: [
         {
         'targets': 0,
         'checkboxes': {
            'selectRow': true
         },
      }, 
            {
               targets: 3,
               data: null,
               render: function (data, type, row) {
                  return '<a href="' + base_url + '/dts/user/view?tn=' + row.tracking_number + '" data-toggle="tooltip" data-placement="top" title="View ' + row.tracking_number + ' ?>">' + row.document_name + '</a>';
               }
            },
   ]

   });
});


$('a#received_documents').on('click', function () {
   selected_items = get_select_items_datatable();
   if (selected_items.length == 0) {
      alert('Please Select at least one');
   } else {
      var url = '/dts/us/r-f-o';
      let form = {
         items: selected_items
      };
      delete_item(form, url, button_text = 'Receive Document', text = '')
   }
}); 
</script>
@endsection