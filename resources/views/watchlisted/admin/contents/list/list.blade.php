@extends('watchlisted.admin.layout.watchlisted_master')
@section('title', $title)
@section('content')
@include('global_includes.title')
@include('watchlisted.admin.contents.list.sections.list_table')
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
      "dom": "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
      buttons: [
            {
               extend: 'copy',
               text: 'Copy',
               className: 'btn btn-warning rounded-pill ',
               footer: true,
               
            }, 
            {
               extend: 'print',
               text: 'Print',
               className: 'btn btn-info rounded-pill  ms-2',
               footer: true,
              
            }, {
               extend: 'csv',
               text: 'CSV',
               className: 'btn btn-success rounded-pill ms-2',
               footer: true,
              
            }, ],
      ajax: {
         url: base_url + "/wl/a-w",
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


$('button#remove').on('click', function(){
    var button_text = 'Submit';
    text = 'Selected individuals will be stored in restore section';
    let items = get_select_items_datatable();

    var url = '/wl/ch-stat';
    var data = {
                id : items,
                status : 'inactive'
    };
    delete_item(data,url,button_text,text);
});
</script>
@endsection