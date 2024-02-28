
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
   <div class="col-md-12 col-12   ">
      <?php echo $__env->make('dts.users.contents.forwarded.sections.forwarded_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   </div>
</div>
<?php echo $__env->make('dts.users.contents.forwarded.sections.forward_offcanvas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('dts.users.contents.forwarded.sections.remarks_update_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<script>


$('a#forward_icon').on('click', function(){
   $('input[name=history_id]').val($(this).data('history-id'));
   $('textarea[name=remarks]').val($(this).data('remarks'));
   $('.offcanvas-title').text('Forward Document #' +$(this).data('tracking-number') );

});


$('a#update_remarks').on('click', function(){
   $('.offcanvas-title').text('Update Remarks Document #' +$(this).data('tracking-number') );
   $('#update_remarks_modal').modal('show');
   $('input[name=history_id]').val($(this).data('history-id'));
   $('textarea[name=remarks_update]').val($(this).data('remarks'));
  

});


$('#update_remarks_form').on('submit', function (e) {
   e.preventDefault();
   var url = '/dts/us/u-f-r';
   var form = $(this).serialize();

   add_item(form,url);
   $('#update_remarks_form').find('button').attr('disabled',true);
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

      add_item(form,url);
      $('#forward_form').find('button').attr('disabled',true);
     }
   });
 
});
</script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('dts.users.layout.user_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/users/contents/forwarded/forwarded.blade.php ENDPATH**/ ?>