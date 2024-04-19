@extends('watchlisted.users.layout.user_watchlisted_master')
@section('title', $title)
@section('content')
@include('global_includes.title')
<div class="row">
   <div class="col-md-12 col-12   ">
      @include('watchlisted.users.contents.pending_list.sections.pending_table')
   </div>
</div>
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
         url: base_url + "/wl/user/g-p-l",
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
      }],
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
                  return '<a href="'+base_url+'/watchlisted/user/view_profile?id='+row.person_id+'" >'+row.name+'</a>';
               }
            },

           

   ]
   });
});

$(document).on('click', 'button#delete', function(){

      var button_text = 'Delete selected items';
      var url = '/wl/user/d-p';
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