<div class="card flex-fill p-3">
         <div class="card-header">
               <h5 class="card-title mb-3">Documents</h5>
               <a class="btn btn-success" href="javascript:;" id="received_documents"><i class="fas fa-hand"></i> Receive </a>
               <hr>
            </div>
         <table class="table table-hover table-striped " id="datatable_with_select" style="width: 100%; "  >
            <thead>
               <tr>
                  <th></th>
               <!-- <th class=""><input type="checkbox" name="check_all" value="true"></th> -->
                  <th>#</th>
                  <!-- <th class="">Action</th> -->
                  <th>Tracking Number</th>
                  <th>Document Name</th>
                  <th>From</th>
                  <th>Document Type</th>
                  <th>Remarks</th>
                  <th>Released Date - Time</th>
                  
               </tr>
            </thead>
            <tbody>

              <?php $i = 1; foreach ($incoming_documents as $row) :  ?>
                <tr>
                  <td><?php echo $row['history_id'].'-'.$row['tracking_number'] ?></td>
                <!-- <td><input type="checkbox" name="document_id" value="<?php echo $row['history_id'].'-'.$row['tracking_number'] ?>"></td> -->
                  <td><?php echo e($i++); ?></td>
                  <!-- <td>    
                     <a class="btn btn-success received_document" data-track="<?php echo e($row['tracking_number']); ?>"  data-id="<?php echo e($row['history_id']); ?>"><i class="fas fa-hand"></i></a>       
                  </td> -->
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