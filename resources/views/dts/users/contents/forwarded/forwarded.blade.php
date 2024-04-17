@extends('dts.users.layout.user_master')
@section('title', $title)
@section('content')

@include('global_includes.title')
<div class="row">
   <div class="col-md-12 col-12   ">
      @include('dts.users.contents.forwarded.sections.forwarded_table')
   </div>
</div>
@include('dts.users.contents.forwarded.sections.forward_offcanvas')
@include('dts.users.contents.forwarded.sections.remarks_update_modal')
@endsection
@section('js')
<!-- @include('dts.includes.datatable') -->
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
      dom: 'Bfrtip',
      buttons: ['copy', 'print', 'csv'],
      ajax: {
         url: base_url + "/dts/us/forwarded-documents",
         method: 'GET',
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
         },
         dataSrc: ""
      },
      columns: [{
         data: 'number',
      }, {
         data: 'tracking_number'
      }, {
         data: null
      }, {
         data: 'forwarded_to'
      }, {
         data: 'type_name'
      }, {
         data: null
      }, {
         data: 'released_date'
      }, {
         data: null
      }, ],
    
      columnDefs: [ 
         {
            targets: 2,
            data: null,
            render: function (data, type, row) {
               return '<a href="' + base_url + '/dts/user/view?tn=' + row.tracking_number + '" data-toggle="tooltip" data-placement="top" title="View ' + row.tracking_number + ' ?>">' + row.document_name + '</a>';
            }
         },
         {
            targets: 5,
            data: null,
            render: function (data, type, row) {
               return row.remarks+'<br><a href="javascript:;" id="update_remarks" class="text-success" data-history-id="'+row.history_id+'" data-remarks="'+row.remarks+'" >Update Remarks</a>';
            }
         },
         
         {
            targets: -1,
            data: null,
            render: function (data, type, row) {
               return '<div class="btn-group dropstart">\
                             <i class="fa fa-ellipsis-v " class="dropdown-toggle"  data-bs-toggle="dropdown" aria-expanded="false"></i>\
                             <ul class="dropdown-menu">\
                                  <li><a class="dropdown-item " id="forward_icon"  data-remarks="'+row.remarks+'" data-history-id="'+row.history_id+'" data-tracking-number="'+row.tracking_number+'"  href="javascript:;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" >Update Forward To</a></li>\
                                 \
                                </ul>\
                           </div>';
            }
         }
      
   ]
   });
});


$(document).on('click', 'a#forward_icon', function(){
   $('input[name=history_id]').val($(this).data('history-id'));
   $('input[name=tracking_number]').val($(this).data('tracking-number'));
   $('textarea[name=remarks]').val($(this).data('remarks'));
  
   $('.offcanvas-title').text('Forward Document #' +$(this).data('tracking-number') );
});

$(document).on('click', 'a#update_remarks', function(){
   $('.offcanvas-title').text('Update Remarks Document #' +$(this).data('tracking-number') );
   $('#update_remarks_modal').modal('show');
   $('input[name=history_id]').val($(this).data('history-id'));
   $('textarea[name=remarks_update]').val($(this).data('remarks'));
  

});


$('#update_remarks_form').on('submit', function (e) {
   e.preventDefault();
   var url = '/dts/us/u-f-r';
   var form = $(this).serialize();
   $('#update_remarks_form').find('button').attr('disabled',true);
   add_item(form,url);
   $('#update_remarks_form').find('button').attr('disabled',false);
   $('#update_remarks_modal').modal('hide');
});

$('#forward_form').on('submit', function (e) {
   e.preventDefault();
   var url = '/dts/us/u-f-d';
   var form = $(this).serialize();



   Swal.fire({
     title: "Are you sure?",
     text: "",
     icon: "warning",
     showCancelButton: true,
     confirmButtonColor: "#3085d6",
     cancelButtonColor: "#d33",
     confirmButtonText: "Foward Document"
   }).then((result) => {
     if (result.isConfirmed) {
      $('#forward_form').find('button').attr('disabled',true);
      add_item(form,url);
      $('#forward_form').find('button').attr('disabled',false);
      $('select[name=forward]').val('');
      let closeCanvas = document.querySelector('[data-bs-dismiss="offcanvas"]');
      closeCanvas.click();
      
     }
   });

 
   
});
</script>



@endsection