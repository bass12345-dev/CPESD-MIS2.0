
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
<script>
   document.addEventListener("DOMContentLoaded", function () {
   table = $("#datatables-buttons").DataTable({
      responsive: true,
      ordering: false,
      processing: true,
      pageLength: 25,
      language: {
         "processing": '<div class="d-flex justify-content-center "> <img class="top-logo mt-4" src="<?php echo e(asset("assets/img/peso_logo.png")); ?>"></div>'
      },
      
      
      ajax: {
         url: base_url + "/dts/us/g-o-d",
         method: 'GET',
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
         },
         dataSrc: ""
      },
   //    columns: [
   //       {
   //       data: 'number',
   //    }, 
   //    {
   //       data: null,
   //    }, 
   //    {
   //       data: 'name',
   //    }, 
   //    {
   //       data: 'document_number',
   //    }, 
   // ],
   //    columnDefs: [ 
   //          {
   //             targets: 1,
   //             data: null,
   //             render: function (data, type, row) {
   //                return '<a href="' + base_url + '/dts/user/view?tn=' + row.document_number + '" data-toggle="tooltip" data-placement="top" title="View ' + row.document_number + ' ?>">' + row.document_name + '</a>';
   //             }
   //          },

           

   // ]

   });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dts.users.layout.user_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/users/contents/outgoing/outgoing.blade.php ENDPATH**/ ?>