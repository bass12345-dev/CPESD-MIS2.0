<div class="card flex-fill p-3">
         <div class="card-header">
            <h5 class="card-title mb-0">Documents</h5>
         </div>
         <table class="table table-hover table-striped " id="datatables-buttons" style="width: 100%; "  >
            <thead>
               <tr>
                  <th class="">Action</th>
                  <th class="">Tracking Number</th>
                  <th class="">Document Name</th>
                  <th class="">From</th>
                  <th class="">Document Type</th>
                  <th class="">Remarks</th>
                  <th class="">Released Date - Time</th>
                  
               </tr>
            </thead>
            <tbody>

              <?php foreach ($incoming_documents as $row) :  ?>
                <tr>
                  <td>    
                     <a class="btn btn-success received_document" data-track="<?php echo e($row['tracking_number']); ?>"  data-id="<?php echo e($row['history_id']); ?>"><i class="fas fa-hand"></i></a>       
                  </td>
                  <td><?php echo e($row['tracking_number']); ?></td>
                  <td><a href="<?php echo e(url('/dts/user/view?tn='.$row['tracking_number'])); ?>" data-toggle="tooltip" data-placement="top" title="View <?php echo $row['tracking_number'] ?>"><?php echo $row['document_name']; ?></a></td>
                  <td><?php echo e($row['from']); ?></td>
                  <td><?php echo e($row['type_name']); ?></td>
                  <td><a href="javascript:;" id="view_remarks" data-remarks="<?php echo e($row['remarks']); ?>">View Remarks</a></td>
                  <td><?php echo e($row['released_date']); ?></td>
                 
                </tr>
              <?php endforeach; ?> 
            </tbody>
         </table>
      </div>




<?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/users/contents/incoming/sections/incoming_table.blade.php ENDPATH**/ ?>