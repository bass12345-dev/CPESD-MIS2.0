<div class="card flex-fill p-3">
   <div class="card-header">
      <h5 class="card-title mb-0">Final Actions</h5>
   </div>
   <table class="table table-hover  " id="datatables-buttons" style="width: 100%; ">
      <thead>
         <tr>

            <th>#</th>
            <th>Name</th>
            <th>Username</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Status</th>
            <th>Actions</th>

         </tr>
      </thead>
      <tbody>
         <?php $i = 1;  foreach($users as $row) : 
               $status = $row->user_status == 'active' ? '<span class="badge bg-success p-2">Active</span>' : '<span class="badge bg-danger p-2">Inactive</span>';

               $button1 = $row->user_status == 'active' ? '<li class="dropdown-item set-inactive"  data-id="'.$row->user_id.'">Remove</li>' : '';
               $button3 = $row->user_status != 'active' ?  '<li class="dropdown-item delete"  data-id="'.$row->user_id.'">Delete</li> <li class="dropdown-item set-active"  data-id="'.$row->user_id.'">Set Active</li>' : '';
                ?>
         <tr>
            <td><?php echo e($i++); ?></td>

            <td><?php echo e($row->first_name.' '.$row->middle_name.' '.$row->last_name.' '.$row->extension); ?></td>
            <td><?php echo e($row->username); ?></td>
            <td><?php echo e($row->address); ?></td>
            <td><?php echo e($row->email_address); ?></td>
            <td><?php echo e($row->contact_number); ?></td>
            <td>
               <?php echo $status ?>
            </td>
            <td>
               <div class="btn-group dropstart">
                  <i class="fa fa-ellipsis-v " class="dropdown-toggle" data-bs-toggle="dropdown"
                     aria-expanded="false"></i>
                  <ul class="dropdown-menu">
                  <?php echo $button1 ?>
                  <!-- <li class="dropdown-item update-username"  data-id="<?php echo e($row->user_id); ?>">Change Password</li> -->
                  <?php echo $button3 ?>
                  </ul>
               </div>
            </td>
           
         </tr>
         <?php endforeach; ?>

      </tbody>
   </table>
</div><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/admin/contents/manage_users/sections/users_table.blade.php ENDPATH**/ ?>