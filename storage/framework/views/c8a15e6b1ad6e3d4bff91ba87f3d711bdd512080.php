<div class="card flex-fill p-3">
	
	 	<div class="card-header">
            
          
        </div>
	<table class="table table-hover table-striped " id="datatables-buttons" style="width: 100%; "  >
            <thead>
               <tr>
                 
                 
                  <th>Record</th>
                  <th>Created</th>
                  
                  <th>Actions</th>
               </tr>
            </thead>
            <tbody>
               <?php foreach($records as $row) :  ?>
                  <tr>
                     <td><?php echo e($row['record_description']); ?></td>
                     <td><?php echo e($row['created_at']); ?></td>
                     <td>    
                           <div class="btn-group dropstart">
                             <i class="fa fa-ellipsis-v " class="dropdown-toggle"  data-bs-toggle="dropdown" aria-expanded="false"></i>
                             <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" id="update" href="javascript:;" data-user-id="<?php echo e($row['p_id']); ?>" data-record="<?php echo e($row['record_description']); ?>" data-record-id="<?php echo e($row['record_id']); ?>">Update</a></li>
                                  <li><a class="dropdown-item" id="remove" href="javascript:;" data-id="<?php echo e($row['record_id']); ?>">Remove</a></li>
                                </ul>
                           </div>
                        </td>
                  </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
     
</div><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/watchlisted/admin/contents/view_profile/sections/records_table.blade.php ENDPATH**/ ?>