
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
                  <th>Name</th>
                  <th>Action</th>
                  <th>Type</th>
                  <th>Date And Time</th>
                  
               </tr>
            </thead>
            <tbody>
     
                  <?php
                   $i = 1;
                   foreach ($actions as $row) :?>
                     <tr>
                        <td><?php echo e($row->first_name); ?> <?php echo e($row->middle_name); ?> <?php echo e($row->last_name); ?> <?php echo e($row->extension); ?></td>
                        <td><a href="<?php echo e(url('/dts/admin/view?tn='.$row->tracking_number)); ?>"><?php echo e($row->action); ?></a></td>
                        <td><span class="badge bg-primary " style="font-size: 12px;"><?php echo e($row->user_type); ?></span></td>
                        <td><?php echo e(date('M d Y h:i A', strtotime($row->action_datetime))); ?></td>
                     </tr>
                <?php endforeach; ?>    
            
              
            </tbody>
         </table>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php echo $__env->make('dts.includes.datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dts.admin.layout.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/admin/contents/action_logs/action_logs.blade.php ENDPATH**/ ?>