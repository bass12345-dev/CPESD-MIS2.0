@extends('dts.receiver.layout.receiver_master')
@section('title', $title)
@section('content')
@include('global_includes.title')
@include('dts.receiver.contents.received.sections.received_table')
@include('dts.receiver.contents.received.sections.final_action_off_canvas')
@endsection
@section('js')


<!-- @include('dts.includes.datatable') -->
<script type="text/javascript">


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
         url: base_url + "/dts/r/g-f-r-r-d",
         method: 'GET',
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
         },
         dataSrc: ""
      },
      columns: [
      {
         data: 'number'
      }, {
         data: 'tracking_number'
      }, {
         data: null
      }, {
         data: 'type_name'
      }, {
         data: 'remarks'
      }, {
         data: 'received_date'
      },{
         data: null
      },
    ],
      'select': {
         'style': 'multi',
      },
      columnDefs: [{
         'targets': 0,
         'checkboxes': {
            'selectRow': true
         },
      }, {
         targets: 3,
         data: null,
         render: function (data, type, row) {
            return '<a href="' + base_url + '/dts/user/view?tn=' + row.tracking_number + '" data-toggle="tooltip" data-placement="top" title="View ' + row.tracking_number + ' ?>">' + row.document_name + '</a>';
         }
      },
      {
         targets: -1,
         data: null,
         render: function (data, type, row) {
            return '<div class="btn-group dropstart">\
                             <i class="fa fa-ellipsis-v " class="dropdown-toggle"  data-bs-toggle="dropdown" aria-expanded="false"></i>\
                             <ul class="dropdown-menu">\
                                  <li><a class="dropdown-item" id="forward_icon" href="#" data-history-id="'+row.history_id+'" data-tracking-number="'+row.tracking_number+'"   data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">Final Action</a></li>\
                                </ul>\
                           </div>';
         }
      }
   
   ],


   });
});

$(document).on('click', 'a#forward_icon', function(){
   $('input[name=id]').val($(this).data('history-id'));
   $('input[name=t_number]').val($(this).data('tracking-number'));
   $('.offcanvas-title').text('Document #' +$(this).data('tracking-number') )
});


$('#forward_form').on('submit', function (e) {
   e.preventDefault();
   var url = '/dts/r/complete-document';
   var form = $(this).serialize();
   add_item(form,url);

});
</script>

@endsection