
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('dts.admin.contents.dashboard.sections.count_section1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('dts.admin.contents.dashboard.sections.count_section2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('dts.admin.contents.dashboard.sections.count_section3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dts.admin.layout.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS2.0\resources\views/dts/admin/contents/dashboard/dashboard.blade.php ENDPATH**/ ?>