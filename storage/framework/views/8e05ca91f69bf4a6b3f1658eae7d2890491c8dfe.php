<div class="card flex-fill p-3">
         <div class="card-header">
            <h5 class="card-title mb-2">To Approve</h5>
            <button class="btn btn-danger" id="delete">Delete</button>
            <button class="btn btn-success" id="approve">Approve</button>
         </div>
         

         <table class="table table-hover table-striped " id="datatable_with_select" style="width: 100%; "  >
            <thead>
               <tr>
                  <th></th>
                  <!-- <th class=""><input type="checkbox" name="check_all" value="true"></th>    -->
                  <th>#</th>
                  <th>Name</th>
                  <th>Age</th>
                  <th>Address</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Encoded By</th>
                  
               </tr>
            </thead>
            <tbody>

                <?php
                   $i = 1;
                   foreach ($list as $row) :?>
                     <tr>
                        <td><?php echo e($row->person_id); ?></td>
                        <!-- <td><input type="checkbox" name="person_id" value="<?php echo e($row->person_id); ?>"></td> -->
                        <td><?php echo $i++; ?></td>
                        <td><a href="<?php echo e(url('/watchlisted/admin/view_profile?id='.$row->person_id)); ?>" ><?php echo $row->first_name.' '.$row->middle_name.' '.$row->last_name.' '.$row->extension; ?></a></td>
                        <td><?php echo $row->age; ?></td>
                        <td><?php echo $row->address; ?></td>
                        <td><?php echo $row->email_address; ?></td>
                        <td><?php echo $row->phone_number; ?></td>
                        <td><?php echo $row->user_first_name.' '.$row->user_middle_name.' '.$row->user_last_name.' '.$row->user_extension ; ?></td>
              
                       
                     </tr>
                <?php endforeach; ?>    
                  
            </tbody>
         </table>
      </div>




<?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/watchlisted/admin/contents/to_approve/sections/to_approve_table.blade.php ENDPATH**/ ?>