
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('dts.admin.contents.all_documents.sections.all_documents_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('dts.receiver.contents.received.sections.final_action_off_canvas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php echo $__env->make('dts.includes.datatable_with_select', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>

document.addEventListener("DOMContentLoaded", function () {
   table = $("#datatable_with_select").DataTable({
      responsive: true,
      ordering: false,
      processing: true,
      pageLength: 25,
      language: {
         "processing": '<div class="d-flex justify-content-center "> <img class="top-logo mt-4" src="<?php echo e(asset("assets/img/peso_logo.png")); ?>"></div>'
      },
      dom: 'Bfrtip',
      buttons: ['copy', 'print', 'csv'],
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
                  data-tracking-number="'+row.tracking_number+'"data-bs-toggle="offcanvas"\
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
$('button#print_slips').on('click', function(){
var selected_items = get_select_items_datatable();
if(selected_items.length  == 0){
   alert('Please Select at least one')
}else{
   var a = window.open(base_url + '/dts/admin/print-slips/?ids='+selected_items, '__blank');
}
});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dts.admin.layout.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/admin/contents/all_documents/all_documents.blade.php ENDPATH**/ ?>