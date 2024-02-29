<div class="card flex-fill p-3">
         <div class="card-header">
            <h5 class="card-title mb-0">Documents</h5>
         </div>
         <table class="table table-hover table-striped " id="datatables-buttons" style="width: 100%; "  >
            <thead>
               <tr>
                
                  <th class="">Tracking Number</th>
                  <th class="">Document Name</th>
                  <th class="">Forwarded To</th>
                  <th class="">Document Type</th>
                  <th class="">Remarks</th>
                  <th class="">Released Date - Time</th>
               </tr>
            </thead>
            <tbody>

              <?php foreach ($forwarded_documents as $row) :  ?>
                <tr>
                  <td><?php echo e($row['tracking_number']); ?></td>
                  <td><?php echo e($row['document_name']); ?></td>
                  <td><?php echo e($row['forwarded_to']); ?></td>
                  <td><?php echo e($row['type_name']); ?></td>
                  <td><a href="javascript:;" id="view_remarks" data-remarks="<?php echo e($row['remarks']); ?>" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >View Remarks</a></td>
                  <td><?php echo e($row['released_date']); ?></td>
                </tr>
              <?php endforeach; ?> 
            </tbody>
         </table>
      </div>




<?php /**PATH C:\xampp\htdocs\CPESD-MIS2.0\resources\views/dts/users/contents/forwarded/sections/forwarded_table.blade.php ENDPATH**/ ?>