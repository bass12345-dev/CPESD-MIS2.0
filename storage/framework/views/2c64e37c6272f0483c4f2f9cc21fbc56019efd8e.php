
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="card flex-fill p-3">
        <div class="card-header">
            <h5 class="card-title mb-0">Logged In History</h5>
         </div>
         <table class="table table-hover  " id="datatables-buttons" style="width: 100%; "  >
            <thead>
               <tr>
                  <th >Name</th>
                  <th >Date And Time</th>
                  
               </tr>
            </thead>
            <tbody>
                  <?php
                   $i = 1;
                   foreach ($l_i_h as $row) :?>
                     <tr>
                        <td class=""><?php echo e($row->first_name); ?> <?php echo e($row->middle_name); ?> <?php echo e($row->last_name); ?> <?php echo e($row->extension); ?></td>
                        <td class=""><?php echo e(date('M d Y h:i a',strtotime($row->logged_in_date))); ?></td>
                        
                     </tr>
                <?php endforeach; ?>    
            </tbody>
         </table>
</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dts.admin.layout.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/admin/contents/logged_in_history/logged_in_history.blade.php ENDPATH**/ ?>