@extends('watchlisted.admin.layout.watchlisted_master')
@section('title', $title)
@section('content')
@include('global_includes.title')
@include('watchlisted.admin.contents.to_approve.sections.to_approve_table')
@endsection

@section('js')
@include('dts.includes.datatable')
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
         url: base_url + "/wl/t-a-w",
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
      },{
         data: 'encoded_by'
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


$('button#delete').on('click', function() {

var button_text = 'Delete selected items';
var url = '/wl/delete';
let items = get_select_items_datatable();

var data = {
   id: items
};
if (items.length == 0) {
   alert('Please Select at least one')
} else {
   delete_item(data, url, button_text);
}
});

$('button#approve').on('click', function() {

var button_text = 'Approve selected items';
var url = '/wl/app-p';
let items = get_select_items_datatable();

var data = {
   id: items
};
if (items.length == 0) {
   alert('Please Select at least one')
} else {
   delete_item(data, url, button_text);
}
});


</script>
@endsection
