<div class="card flex-fill p-3">
   <div class="card-header">
      <h5 class="card-title mb-0">Final Actions</h5>
   </div>
   <table class="table table-hover  " id="datatables-buttons" style="width: 100%; ">
      <thead>
         <tr>
            <th>Type</th>
            <th>Created</th>
            <th>Action</th>
         </tr>
      </thead>
      <tbody>
         <?php
                   $i = 1;
                   foreach ($actions as $row) :?>
         <tr>
            <td><?php echo e($row->action_name); ?></td>
            <td><?php echo e($row->created); ?></td>
            <td>
               <div class="btn-group dropstart">
                  <i class="fa fa-ellipsis-v " class="dropdown-toggle" data-bs-toggle="dropdown"
                     aria-expanded="false"></i>
                  <ul class="dropdown-menu">
                     <li><a class="dropdown-item" id="update" href="javascript:;" data-id="<?php echo e($row->action_id); ?>"
                           data-name="<?php echo e($row->action_name); ?>">Update</a></li>
                     <li><a class="dropdown-item" id="remove" href="javascript:;"
                           data-id="<?php echo e($row->action_id); ?>">Remove</a></li>
                  </ul>
               </div>
            </td>
         </tr>
         <?php endforeach; ?>
      </tbody>
   </table>
</div><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/admin/contents/final_actions/sections/actions_table.blade.php ENDPATH**/ ?>