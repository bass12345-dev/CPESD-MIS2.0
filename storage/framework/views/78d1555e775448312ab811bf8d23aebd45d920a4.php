
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
   <div class="col-md-12 col-12   ">
      <?php echo $__env->make('dts.users.contents.my_documents.sections.document_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   </div>
</div>

<?php echo $__env->make('dts.users.contents.my_documents.modals.update_document_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<script>

$('a.update_document').on('click', function(){
   $('input[name=t_number]').val($(this).data('tracking-number'));
   $('input[name=document_name]').val($(this).data('name'));
   $('select[name=document_type]').val($(this).data('type'));
   $('textarea[name=description]').val($(this).data('description'));
   // $('select[name=type]').val($(this).data('destination'));
});

$('#update_document').on('submit', function(e){
   e.preventDefault();
   var url  = '/dts/us/update-document';
   var form = $('form#update_document').serialize();
   var id   = $('input[name=t_number]').val();
   update_item(id,form,url);
});

$('a.remove_document').on('click', function(){

var id = $(this).data('id');
var t = $(this).data('track');

let form = {id : id}
var url = '/dts/us/delete-my-document';
delete_item(form,url,button_text = 'Remove Document',text = "Document #" + t)

});

$('a.cancel_document').on('click', function(){
var id = $(this).data('id');
var t = $(this).data('track');


let form = {id : id}
var url = '/dts/us/c-doc';


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
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dts.users.layout.user_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/users/contents/my_documents/my_documents.blade.php ENDPATH**/ ?>