<div class="card flex-fill p-3">
         <div class="card-header">
            <h5 class="card-title mb-2">Documents</h5>
           
         </div>
         

         <table class="table table-hover table-striped " id="datatables-buttons" style="width: 100%; "  >
            <thead>
               <tr>
                  
                  <th>#</th>
                  <th>Name</th>
                  <th>Age</th>
                  <th>Address</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  
               </tr>
            </thead>
            <tbody>

                <?php
                   $i = 1;
                   foreach ($approved as $row) :?>
                     <tr>
                       
                        <td><?php echo $i++; ?></td>
                        <td><a href="<?php echo e(url('/watchlisted/user/view_profile?id='.$row->person_id)); ?>" ><?php echo $row->first_name.' '.$row->middle_name.' '.$row->last_name.' '.$row->extension; ?></a></td>
                        <td><?php echo $row->age; ?></td>
                        <td><?php echo $row->address; ?></td>
                        <td><?php echo $row->email_address; ?></td>
                        <td><?php echo $row->phone_number; ?></td>
                       
                       
                     </tr>
                <?php endforeach; ?>    
                  
            </tbody>
         </table>
      </div>




<?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/watchlisted/users/contents/approved_list/sections/approved_table.blade.php ENDPATH**/ ?>