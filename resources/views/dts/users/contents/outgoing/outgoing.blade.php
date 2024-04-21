@extends('dts.users.layout.user_master')
@section('title', $title)
@section('content')

@include('global_includes.title')
<div class="row">
   <div class="col-md-12 col-12   ">
   @include('dts.users.contents.outgoing.sections.outgoing_table')
   </div>
</div>
@include('dts.users.contents.outgoing.modals.update_outgoing_modal')
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
         data: 'office',
      }, 
      {
         data: 'type_name',
      }, 
      {
         data: null,
      }, 
      {
         data: 'outgoing_date',
      }, {
         data: null,
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
               targets: 6,
               data: null,
               render: function (data, type, row) {
                  return '<a href="javascript:;" data-remarks="'+row.remarks+'" id="view_remarks">View Remarks</a>';
               }
            },
      {
               targets: 3,
               data: null,
               render: function (data, type, row) {
                  return '<a href="' + base_url + '/dts/user/view?tn=' + row.tracking_number + '" data-toggle="tooltip" data-placement="top" title="View ' + row.tracking_number + '">' + row.document_name + '</a>';
               }
            },
            {
         targets: -1,
         data: null,
         orderable: false,
         className: 'text-center',
         render: function (data, type, row) {
               return '<div class="btn-group dropstart">\
                           <i class="fa fa-ellipsis-v " class="dropdown-toggle"  data-bs-toggle="dropdown" aria-expanded="false"></i>\
                              <ul class="dropdown-menu">\
                                 <li><a class="dropdown-item " data-remarks="'+row.remarks+'" data-outgoing-id="'+row.outgoing_id+'" data-office="'+row.office_id+'" id="update_outgoing">Update</a></li>\
                              </ul>\
                           </i>\
                        </div>\
               ';
             
           
             
         }
      }
           
   ]

   });
});

$(document).on('click', 'a#update_outgoing', function(){
      $('#update_outgoing_modal').modal('show');
      $('textarea[name=remarks]').val($(this).data('remarks'));
      $('select[name=office]').val($(this).data('office'));
      $('input[name=outgoing_id]').val($(this).data('outgoing-id'));
});

$('#update_outgoing_form').on('submit', function (e) {
   e.preventDefault();
   var url = '/dts/us/u-o-d';
   var form = $(this).serialize();
   Swal.fire({
      title: "Are you sure?",
      text: "",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Submit"
   }).then((result) => {
      if (result.isConfirmed) {
         $('#update_outgoing_form').find('button').attr('disabled', true);
         add_item(form, url);
         $('#update_outgoing_form').find('button').attr('disabled', false);
         $('#update_outgoing_form')[0].reset();
         $('#update_outgoing_modal').modal('hide');
      }
   });
});


$(document).on('click', 'a#received_documents', function(){
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