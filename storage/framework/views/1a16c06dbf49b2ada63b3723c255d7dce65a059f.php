

<div class="card flex-fill p-3">
         <div class="card-header">
            <h5 class="card-title mb-2">Information</h5>
            <button class="btn btn-primary update_information_button" data-bs-toggle="offcanvas" data-bs-target="#update_canvas">Update Information</button>
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
         <td>Gender</td>
         <td class="gender"><?php
                  
                  $display_gender = $person_data->gender;
                  echo strtoupper($display_gender[0]).''.ltrim($display_gender,$display_gender[0]);
                  
         ?></td>
      </tr>
      <tr>
         <td>Added</td>
         <td><?php echo e(date('M d Y', strtotime($person_data->created_at))); ?></td>
      </tr>
      <tr>
         <td>Encoded By</td>
         <td><?php echo e($person_data->user_first_name.' '.$person_data->user_middle_name.' '.$person_data->user_last_name.' '.$person_data->user_extension); ?></td>
      </tr>
       <tr>
         <td>Status</td>
         <?php 
               $status  = '';
               $bg      = '';

               switch ($person_data->status) {
                  case 'not-approved':
                     $status = 'To Approved';
                     $bg = 'bg-warning';
                     break;
                  case 'inactive':
                     $status = 'Removed';
                     $bg = 'bg-success';
                     break;
                  case 'active': 
                     $status = 'Active';
                     $bg = 'bg-danger';
                  
                  default:
                    
                     break;
               }
         ?>
         <td ><span class="<?php echo e($bg); ?> p-2 text-black badge " style="font-size: 17px;"><?php echo e($status); ?></span></td>
      </tr>
      

   </table>      

</div>


<?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/watchlisted/admin/contents/view_profile/sections/info.blade.php ENDPATH**/ ?>