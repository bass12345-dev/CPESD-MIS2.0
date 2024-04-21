
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('dts.admin.contents.set_receiver.sections.set_receiver_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<hr>
<?php echo $__env->make('dts.admin.contents.set_receiver.sections.set_oic_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
    $('#update_receiver_form').on('submit', function (e) {
      e.preventDefault();
      var form = $(this).serialize();
      var id = '';
      var url = '/dts/u-r';
      update_item(id,form,url);
     
      $('#update_receiver_form').find('button').attr('disabled',true);
   });


   $('#update_oic_form').on('submit', function (e) {
      e.preventDefault();
      var form = $(this).serialize();
      var id = '';
      var url = '/dts/u-oic';
      update_item(id,form,url);
     
      $('#update_oic_form').find('button').attr('disabled',true);
   });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dts.admin.layout.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS2.0\resources\views/dts/admin/contents/set_receiver/set_receiver.blade.php ENDPATH**/ ?>