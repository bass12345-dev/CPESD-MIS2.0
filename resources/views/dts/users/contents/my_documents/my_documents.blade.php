@extends('dts.users.layout.user_master')
@section('title', $title)
@section('content')

@include('global_includes.title')
<div class="row">
   <div class="col-md-12 col-12   ">
      @include('dts.users.contents.my_documents.sections.document_table')

   </div>
</div>
@include('dts.users.contents.my_documents.modals.print_modal')
@include('dts.users.contents.my_documents.modals.update_document_modal')
@endsection
@section('js')
@include('dts.includes.datatable_with_select')


<script>
$(document).ready(function () {
   table = $("#my_document_table").DataTable({
      responsive: true,
      ordering: false,
      processing: true,
      searchDelay: 500,
      pageLength: 25,
      language: {
         "processing": '<div class="d-flex justify-content-center "><img class="top-logo mt-4" src="{{asset("assets/img/peso_logo.png")}}"></div>'
      },
      "dom": "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
      buttons: [
            {
               extend: 'copy',
               text: 'Copy',
               className: 'btn btn-warning rounded-pill ',
               footer: true,
               exportOptions: {
                  columns: 'th:not(:last-child)',
                 
               }
            }, 
            {
               extend: 'print',
               text: 'Print',
               className: 'btn btn-info rounded-pill  ms-2',
               footer: true,
               exportOptions: {
                  columns: 'th:not(:last-child)'
               }
            }, {
               extend: 'csv',
               text: 'CSV',
               className: 'btn btn-success rounded-pill ms-2',
               footer: true,
               exportOptions: {
                  columns: 'th:not(:last-child)',
               }
            }, ],
      ajax: {
         url: base_url + "/dts/us/my-documents",
         method: 'POST',
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
         },
         dataSrc: ""
      },
      columns: [{
         data: 'document_id'
      }, {
         data: 'number'
      }, {
         data: 'tracking_number'
      }, {
         data: null
      }, {
         data: 'type_name'
      }, {
         data: 'created'
      }, {
         data: 'is'
      }, {
         data: null
      }, ],
      'select': {
         'style': 'multi',
      },
      columnDefs: [{
         'targets': 0,
         'checkboxes': {
            'selectRow': true
         }
      }, {
         targets: 3,
         data: null,
         render: function (data, type, row) {
            return '<a href="' + base_url + '/dts/user/view?tn=' + row.tracking_number + '" data-toggle="tooltip" data-placement="top" title="View ' + row.tracking_number + '">' + row.document_name + '</a>';
         }
      }, {
         targets: -1,
         data: null,
         orderable: false,
         className: 'text-center',
         render: function (data, type, row) {
            return '<div class="btn-group dropstart">\ <i class="fa fa-ellipsis-v " class="dropdown-toggle"  data-bs-toggle="dropdown" aria-expanded="false"></i>\ <ul class="dropdown-menu">\ <li><a class="dropdown-item update_document" \ data-tracking-number="' + row.tracking_number + '" \ data-name            ="' + row.document_name + '"\ data-type            ="' + row.doc_type + '"\ data-description     ="' + row.description + '"\ data-destination     ="' + row.destination_type + '"\ data-origin          ="' + row.origin_id + '"\ href="javascript:;" class="" data-bs-toggle="modal" data-bs-target="#update_document">Update</a></li>\ \ <li><a class="dropdown-item print_button" \ data-id              ="' + row.document_id + '" \ data-track           ="' + row.tracking_number + '" \ data-name            ="' + row.document_name + '" \ data-type            ="' + row.document_type_name + '" \ data-description     ="' + row.description + '" \ data-destination     ="' + row.destination_type + '" \ data-received        ="' + row.created + '"\ data-encoded-by      ="' + row.encoded_by + '"\ data-origin          ="' + row.origin + '"\ href="javascript:;" >Print Tracking Slip</a></li>\ </ul>\ </div>'
         }
      }]
   });
});
$(document).on('click', 'a.update_document', function (e) {
   $('input[name=t_number]').val($(this).data('tracking-number'));
   $('input[name=document_name]').val($(this).data('name'));
   $('select[name=document_type]').val($(this).data('type'));
   $('textarea[name=description]').val($(this).data('description'));
   $('select[name=origin]').val($(this).data('origin'));
   $('select[name=type]').val($(this).data('destination'));
});
$('#update_document').on('submit', function (e) {
   e.preventDefault();
   var url = '/dts/us/update-document';
   var form = $('form#update_document').serialize();
   var id = $('input[name=t_number]').val();
   update_item(id, form, url);
});
$('a.remove_document').on('click', function () {
   var id = $(this).data('id');
   var t = $(this).data('track');
   let form = {
      id: id
   };
   var url = '/dts/us/delete-my-document';
   delete_item(form, url, button_text = 'Remove Document', text = "Document #" + t);
});
$(document).on('click', 'a.print_button', function (e) {
   var id = $(this).data('id');
   var name = $(this).data('name');
   var track = $(this).data('track');
   var document_type = $(this).data('type');
   var created = $(this).data('received');
   var encoded_by = $(this).data('encoded-by');
   var destination = $(this).data('destination');
   var description = $(this).data('description');
   var origin = $(this).data('origin');
   $('#print_slip_modal').find('.document_name').text(name);
   $('#print_slip_modal').find('.print_tracking_number').text(track);
   $('#print_slip_modal').find('.document_type').text(document_type);
   $('#print_slip_modal').find('.created').text(created);
   $('#print_slip_modal').find('.encoded_by').text(encoded_by);
   $('#print_slip_modal').find('.type').text(destination);
   $('#print_slip_modal').find('.description').text(description);
   $('#print_slip_modal').find('.origin').text(origin);
   $('#print_slip_modal').modal('show');
});

function print_slip() {
   var div = document.getElementById("slip").innerHTML;
   var a = window.open('', '');
   a.document.write('<html><title>Routing Slip</title>');
   a.document.write('<body>');
   a.document.write(div);
   a.document.write('</body></html>');
   a.document.close();
   a.print();
}
$('a#print_slips').on('click', function () {
   var selected_items = get_select_items_datatable();
   if (selected_items.length == 0) {
      alert('Please Select at least one');
   } else {
      var a = window.open(base_url + '/dts/user/print-slips/?ids=' + selected_items, '__blank');
   }
});
</script>

@endsection