

<div class="card flex-fill p-3">
         <div class="card-header">
            <h5 class="card-title mb-2">Information</h5>
            <?php 
               if(session('watch_id') == $person_data->user_id){
                  echo '<button class="btn btn-primary update_information_button" data-bs-toggle="offcanvas" data-bs-target="#update_canvas">Update Information</button>';
               }
            ?>
            
         </div>
     
   <table class="table table-hover table-striped " style="width: 100%; "  >
      <tr>
         <td>Full Name</td>
         <td class="name"><?php echo e($person_data->first_name); ?> <?php echo e($person_data->middle_name); ?>  <?php echo e($person_data->last_name); ?> <?php echo e($person_data->extension); ?></td>
      </tr>
       <tr>
         <td>Email Address</td>
         <td class="email"><?php echo e($person_data->email_address); ?></td>
      </tr>
       <tr>
         <td>Phone Number</td>
         <td class="phone_number"><?php echo e($person_data->phone_number); ?></td>
      </tr>
      <tr>
         <td>Address</td>
         <td class="address"><?php echo e($person_data->address); ?></td>
      </tr>
      <tr>
         <td>Age</td>
         <td class="age"><?php echo e($person_data->age); ?></td>
      </tr>
      <tr>
         <td>Added</td>
         <td><?php echo e($person_data->created_at); ?></td>
      </tr>
      <tr>
         <td>Encoded By</td>
         <td><?php echo e($person_data->user_first_name.' '.$person_data->user_middle_name.' '.$person_data->user_last_name.' '.$person_data->user_extension); ?></td>
      </tr>
       <tr>
         <td>Status</td>
         <td ><span class="<?php echo e($person_data->status == 'active' ? 'bg-danger' : 'bg-success'); ?> p-2 text-black badge " style="font-size: 17px;"><?php echo e($person_data->status == 'active'? 'Active' : 'Forgiven'); ?></span></td>
      </tr>
      

   </table>      

</div>


<?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/watchlisted/users/contents/view_profile/sections/info.blade.php ENDPATH**/ ?>