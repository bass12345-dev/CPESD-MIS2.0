
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('dts.receiver.contents.received.sections.received_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('dts.receiver.contents.received.sections.final_action_off_canvas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>


<?php echo $__env->make('dts.includes.datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script type="text/javascript">

$('a#forward_icon').on('click', function(){
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dts.receiver.layout.receiver_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/receiver/contents/received/received.blade.php ENDPATH**/ ?>