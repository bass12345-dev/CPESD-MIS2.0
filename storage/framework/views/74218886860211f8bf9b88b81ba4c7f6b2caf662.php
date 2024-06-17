
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('dts.admin.contents.dashboard.sections.count_section1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('dts.admin.contents.dashboard.sections.count_section2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('dts.admin.contents.dashboard.sections.count_section3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
    function print_status(){
        var div = document.getElementById("user_logged_in_status").innerHTML;
        var a = window.open('', '');
        a.document.write('<html><title>Login Status And Pending Documents</title><style rel="stylesheet" type="text/css">\
        body { margin-top : 50px}\
        </style>');
        a.document.write('<body>');
        a.document.write(div);
        a.document.write('</body></html>');
        a.document.close();
        a.print();
    }


introJs().setOptions(
      
        {
            "dontShowAgain": true,
            showProgress: true,          
  steps: [{
    title: 'Welcome',
    intro: 'Hello Admin of CPESD-MIS Document Tracking System There\'s a new update! 👋'
  },
  {
    title: 'Final Receiver',
    element: document.querySelector('.count-total-final'),
    intro: 'Count Final Receiver\'s Pending Documents'
  },
  {
    title: 'Users Logged in Status And Pending Documents',
    element: document.querySelector('.log-status'),
    intro: 'Track Logged In Status and count Incoming/Received Documents'
  }]
},

).start();



</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dts.admin.layout.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Apache24\htdocs\CPESD-MIS2.0\resources\views/dts/admin/contents/dashboard/dashboard.blade.php ENDPATH**/ ?>