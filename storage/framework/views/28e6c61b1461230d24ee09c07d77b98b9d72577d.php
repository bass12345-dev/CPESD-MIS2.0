<div class="card flex-fill p-3">
         <div class="card-header">
            <h5 class="card-title mb-0">Final Actions</h5>
         </div>
         <table class="table table-hover  " id="datatables-buttons" style="width: 100%; "  >
            <thead>
               <tr>
                
                  <th >#</th>
                  <th >Name</th>
                  <th >Username</th>
                  <th >Address</th>
                  <th >Email</th>
                  <th >Phone Number</th>
                   <th >Status</th>
                  <th >Actions</th>
                 
               </tr>
            </thead>
            <tbody>
               <?php $i = 1;  foreach($users as $row) : 
               $status = $row->user_status == 'active' ? '<span class="badge bg-success p-2">Active</span>' : '<span class="badge bg-danger p-2">Inactive</span>';

               $button1 = $row->user_status == 'active' ? '<a class="btn btn-warning set-inactive" 
               data-id="'.$row->user_id.'" ><i class="fas fa-close"></i></a>' : '';
               $button3 = $row->user_status != 'active' ? '<a class="btn btn-danger delete" data-id="'.$row->user_id.'"><i class="fas fa-trash"></i></a> <a class="btn btn-success set-active" data-id="'.$row->user_id.'" ><i class="fas fa-check"></i></a>' : '';
                ?>
                  <tr>
                     <td><?php echo e($i++); ?></td>
                     
                     <td><?php echo e($row->first_name.' '.$row->middle_name.' '.$row->last_name.' '.$row->extension); ?></td>
                     <td><?php echo e($row->username); ?></td>
                     <td><?php echo e($row->address); ?></td>
                     <td><?php echo e($row->email_address); ?></td>
                     <td><?php echo e($row->contact_number); ?></td>
                     <td><?php echo $status ?></td>
                     <td >
                        <?php echo $button1; ?>
                        <a class="btn btn-primary"><i  class="fas fa-key" ></i></a>
                        <?php echo $button3; ?>
                     </td>
                  </tr>
               <?php endforeach; ?>
                  
            </tbody>
         </table>
      </div><?php /**PATH C:\xampp\htdocs\CPESD-MIS2.0\resources\views/dts/admin/contents/manage_users/sections/users_table.blade.php ENDPATH**/ ?>