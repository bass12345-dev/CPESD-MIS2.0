@extends('dts.users.layout.user_master')
@section('title', $title)
@section('content')

@include('global_includes.title')
<div class="row">
   <div class="col-md-12 col-12   ">
      @include('dts.users.contents.incoming.sections.incoming_table')
   </div>
</div>
@endsection
@section('js')
@include('dts.includes.datatable_with_select')
<script>

document.addEventListener("DOMContentLoaded", function() {
   table = $("#datatable_with_select").DataTable({
         responsive: true,
         ordering: false,
         processing: true,
         // serverSide: true,
         pageLength: 25,
         language: { "processing": '<div class="d-flex justify-content-center "> <img class="top-logo mt-4" src="{{asset("assets/img/peso_logo.png")}}"></div>' },
         dom: 'Bfrtip',
         buttons: [
            'copy', 'print','csv'
         ],
            ajax: {
                url: base_url + "/dts/us/incoming-documents",
                method: 'POST',
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            dataSrc:""
            
         },
        
         columns: [
                { data: 'his+tn', },
                { data: 'number' },
                { data: 'tracking_number' },
                { data: 'document_name' },
                { data: 'from' },
                { data: 'type_name' },
                { data: 'remarks' },
                { data: 'released_date' },
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
            ]
   });
});





$('a#received_documents').on('click', function(){

selected_items = get_select_items_datatable();

if(selected_items.length  == 0){
   alert('Please Select at least one')
}else{
   var url = '/dts/us/receive-documents';
   let form = {
         items : selected_items
   }
   delete_item(form, url, button_text = 'Receive Document', text = '')
  
}



});
</script>

@endsection