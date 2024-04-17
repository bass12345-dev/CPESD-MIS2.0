
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="card flex-fill p-3">
        <div class="card-header">
            <h5 class="card-title mb-0">Action Logs</h5>
         </div>
         <table class="table table-hover  " id="datatables-buttons" style="width: 100%; "  >
            <thead>
               <tr>
                  <th>#</th>
                  <th>Action</th>
                  <th>Date And Time</th>
               </tr>
            </thead>
           
         </table>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<!-- <?php echo $__env->make('dts.includes.datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->
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
      dom: 'Bfrtip',
      buttons: ['copy', 'print', 'csv'],
      ajax: {
         url: base_url + "/dts/us/my-action-logs",
         method: 'GET',
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
         },
         dataSrc: ""
      },
      columns: [
         {
         data: 'number',
      }, 
         {
         data: null,
      }, 
      {
         data: 'action_datetime'
      }, 
     
          ],
          columnDefs: [ 
            {
               targets: 1,
               data: null,
               render: function (data, type, row) {
                  return '<a href="' + base_url + '/dts/user/view?tn=' + row.tracking_number + '" data-toggle="tooltip" data-placement="top" title="View ' + row.tracking_number + ' ?>">' + row.action + '</a>';
               }
            },

           

   ]

   });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dts.users.layout.user_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/users/contents/action_logs/action_logs.blade.php ENDPATH**/ ?>