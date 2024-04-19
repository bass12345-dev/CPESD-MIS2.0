@extends('watchlisted.admin.layout.watchlisted_master')
@section('title', $title)
@section('content')
@include('global_includes.title')
@include('watchlisted.admin.contents.restore.sections.restore_table')
@endsection

@section('js')
@include('dts.includes.datatable_with_select')
<script>
document.addEventListener("DOMContentLoaded", function () {
   table = $("#datatable_with_select").DataTable({
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
         url: base_url + "/wl/r-f-w",
         method: 'GET',
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
         },
         dataSrc: ""
      },
      columns: [
         {
         data: 'person_id'
      },
      {
         data: 'number'
      }, {
         data: null
      }, {
         data: 'age'
      }, {
         data: 'address'
      }, {
         data: 'email'
      }, {
         data: 'phone_number'
      }
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
               targets: 2,
               data: null,
               render: function (data, type, row) {
                  return '<a href="'+base_url+'/watchlisted/admin/view_profile?id='+row.person_id+'" >'+row.name+'</a>';
               }
            },

           

   ]
   });
});



$('button#delete').on('click', function(){
    let items = get_select_items_datatable();
    var url = '/wl/delete';
    var data = {
                id : items,
  
    };
   delete_item(data,url);
    
});


$('button#restore').on('click', function(){
    var button_text = 'Submit';
    text = 'Selected individuals will be back to active list';
    let items = get_select_items_datatable();
    var url = '/wl/ch-stat';
    var data = {
                id : items,
                status : 'active'
  
    };
   delete_item(data,url,button_text,text);
    
});
</script>
@endsection