
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('dts.users.contents.dashboard.sections.count_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('dts.users.contents.dashboard.sections.count_section1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
    introJs().setOptions(
      
        {
            "dontShowAgain": true,
            showProgress: true,          
  steps: [{
    title: 'Welcome',
    intro: 'Hello Ka people of CPESD There\'s a new update! 👋'
  },
  {
    intro: 'Outgoing Documents',
    element: document.querySelector('.outgoing-card'),
    intro: 'Count Outgoing Documents Outside Office'
  },
  {
    title: 'Documents Forwarded',
    element: document.querySelector('.documents_forwarded'),
    intro: 'Track Forwarded Documents'
  }]
},

).start();


</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dts.users.layout.user_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS2.0\resources\views/dts/users/contents/dashboard/dashboard.blade.php ENDPATH**/ ?>