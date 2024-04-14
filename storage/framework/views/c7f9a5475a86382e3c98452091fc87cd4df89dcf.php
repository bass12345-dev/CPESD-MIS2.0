
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
   <div class="col-md-12 col-12   ">
   <?php echo $__env->make('dts.users.contents.outgoing.sections.outgoing_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php echo $__env->make('dts.includes.datatable_with_select', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('dts.users.layout.user_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/users/contents/outgoing/outgoing.blade.php ENDPATH**/ ?>