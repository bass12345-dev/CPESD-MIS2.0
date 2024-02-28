
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('dts.admin.contents.all_documents.sections.all_documents_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('dts.receiver.contents.received.sections.final_action_off_canvas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
    $('button#delete').on('click', function(){
    let items = [];
    var button_text = 'Remove selected items';
    $('input[name=document_id]:checked').map(function(item){

        items.push($(this).val());
    });

    var url = '/dts/delete-documents';
    var data = {
                id : items,
              
    };
    delete_item(data,url,button_text);
});


$('input[name=check_all]').on('change', function(){

   var check = $('input[name=check_all]:checked').val();
   if(check == 'true'){
      $('input[name=document_id]').prop('checked', true);
   }else {
      $('input[name=document_id]').prop('checked', false);
   } 
});


$('a#forward_icon').on('click', function(){
   $('input[name=id]').val($(this).data('history-id'));
   $('input[name=t_number]').val($(this).data('tracking-number'));
   $('.offcanvas-title').text('Document #' +$(this).data('tracking-number') )
});


$('#forward_form').on('submit', function (e) {
   e.preventDefault();
   var url = '/dts/complete-document';
   var form = $(this).serialize();
   add_item(form,url);

});

$('input[name="dates"]').daterangepicker();

$('button#filter').on('click', function(){
   var dates = $('input[name="dates"]').val();
   var document_type = $('select[name="select_document_types"]').val();
   var date = dates.split(' - ');
   var from = date[0];
   var to = date[1];
   
   if(!document_type){
    window.location.href = base_url + '/dts/admin/all-documents?from='+from+'&&to='+to;
   }else {
    window.location.href = base_url + '/dts/admin/all-documents?from='+from+'&&to='+to+'&&type='+document_type;
   }
});


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


$('a#revert_document').on('click', function(){
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
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dts.admin.layout.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/admin/contents/all_documents/all_documents.blade.php ENDPATH**/ ?>