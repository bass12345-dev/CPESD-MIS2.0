@extends('dts.admin.layout.admin_master')
@section('title', $title)
@section('content')
@include('global_includes.title')
@include('dts.admin.contents.all_documents.sections.all_documents_table')
@include('dts.receiver.contents.received.sections.final_action_off_canvas')
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
         url: base_url + "/dts/all-documents",
         method: 'GET',
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
      },{
         data: null
      }, ],
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
            var html = '';
           if(row.history_status != 'completed' && row.history_status != 'outgoing' ) {

                  html += '<div class="btn-group dropstart">\
                            <i class="fa fa-ellipsis-v " class="dropdown-toggle"  data-bs-toggle="dropdown" aria-expanded="false"></i>\
                            <ul class="dropdown-menu">';
                  if(row.history_status != 'pending' && row.history_status == 'cancelled'){

                     html += '<li><a class="dropdown-item" id="revert_document" href="#" data-history-id="'+row.history_id+'"\
                  data-tracking-number="'+row.tracking_number+'">Revert</a></li>';
                  }

                  if(row.history_status != 'completed' && row.history_status == 'pending' && row.history_status != 'cancelled'){
                     html += '<li><a class="dropdown-item" id="forward_icon" href="#" data-history-id="'+row.history_id+'"\
                  data-tracking-number="'+row.tracking_number+'" data-bs-toggle="offcanvas"\
                  data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">Complete Document</a></li>';
                  }
              
           }

           return html;
         }
      }
   
   ]
   });
});


//MULTIPLE ACTIONS
$('button#delete').on('click', function(){
    var button_text = 'Delete selected items';
    var text = 'Document History will be deleted also';
    var url = '/dts/delete-documents';
    let items = get_select_items_datatable();
    var data = {id : items};

    if(items.length  == 0){
      alert('Please Select at least one')
    }else{
      delete_item(data,url,button_text,text);
    }
   
});


$('button#cancel').on('click', function(){

   var button_text = 'Cancel selected items';
   var url = '/dts/cancel-documents';
   var items = get_select_items_datatable();
   var data = {id : items};
   if(items.length  == 0){
      alert('Please Select at least one')
    }else{
      delete_item(data,url,button_text);
   }
});





//INDIVIDUAL ACTIONS 

$('a#cancel_document').on('click', function(){
var t = $(this).data('tracking-number');

let form = {t : t}
var url = '/dts/cancel-document';

Swal.fire({
     title: "Are you sure?",
     text: "",
     icon: "warning",
     showCancelButton: true,
     confirmButtonColor: "#3085d6",
     cancelButtonColor: "#d33",
     confirmButtonText: "Cancel Document #" + t
   }).then((result) => {
     if (result.isConfirmed) {
      add_item(form,url);
      
     }
});

});



$(document).on('click','a#revert_document', function(){
var t = $(this).data('tracking-number');

let form = {t : t}
var url = '/dts/revert-document';

Swal.fire({
     title: "Are you sure?",
     text: "",
     icon: "warning",
     showCancelButton: true,
     confirmButtonColor: "#3085d6",
     cancelButtonColor: "#d33",
     confirmButtonText: "Revert Document #" + t
   }).then((result) => {
     if (result.isConfirmed) {
      add_item(form,url);
      
     }
});

});

$(document).on('click','a#forward_icon', function(){
   $('input[name=id]').val($(this).data('history-id'));
   $('input[name=t_number]').val($(this).data('tracking-number'));
   $('.offcanvas-title').text('Document #' +$(this).data('tracking-number') )
});


$('#forward_form').on('submit', function (e) {
   e.preventDefault();
   var url = '/dts/complete-document';
   var form = $(this).serialize();
   $('#forward_form').find('button').attr('disabled', true);
   add_item(form,url);
   $('#forward_form').find('button').attr('disabled', false);
   $('#forward_form')[0].reset();
   let closeCanvas = document.querySelector('[data-bs-dismiss="offcanvas"]');
   closeCanvas.click();
});




//FILTER

$('input[name="dates"]').daterangepicker();

$('button#filter').on('click', function(){
   var dates         = $('input[name="dates"]').val();
   var document_type = $('select[name="select_document_types"]').val();
   var document_status = $('select[name="select_document_status"]').val();
   var date = dates.split(' - ');
   var from = date[0];
   var to = date[1];
   
   window.location.href = base_url + '/dts/admin/all-documents?from='+from+'&&to='+to+'&&type='+document_type+'&&status='+document_status;
  
});


//PRINT
$(document).on('click','button#print_slips', function(){
   alert('asd')
})
// $('button#print_slips').on('click', function(){
//    alert('asd')
// // var selected_items = get_select_items_datatable();
// // if(selected_items.length  == 0){
// //    alert('Please Select at least one')
// // }else{
// //    var a = window.open(base_url + '/dts/admin/print-slips/?ids='+selected_items, '__blank');
// // }
// });

</script>
@endsection