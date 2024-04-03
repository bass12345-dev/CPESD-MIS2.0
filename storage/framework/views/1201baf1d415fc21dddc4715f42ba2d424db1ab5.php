
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
   <div class="col-12 col-md-12">
       <?php echo $__env->make('dts.admin.contents.view.sections.document_information', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   
   </div>
   
   
</div>
<div class="row">
   
   <div class="col-12  col-md-12 ">
       <?php echo $__env->make('dts.admin.contents.view.sections.history', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   </div>
   
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<script>

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dts.admin.layout.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/admin/contents/view/view.blade.php ENDPATH**/ ?>