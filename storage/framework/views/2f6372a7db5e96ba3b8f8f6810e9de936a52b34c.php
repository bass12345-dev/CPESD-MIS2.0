<div class="card flex-fill p-3">
         <div class="card-header">
            <h5 class="card-title mb-0">Documents</h5>
         </div>
         <table class="table table-hover table-striped " id="datatables-buttons" style="width: 100%; "  >
            <thead>
               <tr>
                
                  <th class="">Tracking Number</th>
                  <th class="">Document Name</th>
                  <th class="">Document Type</th>
                  <th class="">Remarks</th>
                  <th class="">Received Date - Time</th>
                  <th class="">Actions</th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($received_documents as $row) : ?>
                <tr>
                  <td><?php echo e($row['tracking_number']); ?></td>
                  <td><?php echo e($row['document_name']); ?></td>
                  <td><?php echo e($row['type_name']); ?></td>
                  <td><a href="javascript:;" id="view_remarks" data-remarks="<?php echo e($row['remarks']); ?>" data-bs-toggle="modal" data-bs-target="#staticBackdrop">View Remarks</a></td>
                  <td><?php echo e($row['received_date']); ?></td>
                 <td>    
                           <div class="btn-group dropstart">
                             <i class="fa fa-ellipsis-v " class="dropdown-toggle"  data-bs-toggle="dropdown" aria-expanded="false"></i>
                             <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="<?php echo e(url('/dts/user/view?tn='.$row['tracking_number'])); ?>">View</a></li>
                                  <li><a class="dropdown-item" id="forward_icon" href="#" data-history-id="<?php echo e($row['history_id']); ?>" data-tracking-number="<?php echo e($row['tracking_number']); ?>"  data- data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">Final Action</a></li>
                                </ul>
                           </div>
                        </td>
                </tr>
             <?php endforeach; ?>
            </tbody>
         </table>
      </div>




<?php /**PATH C:\xampp\htdocs\CPESD-MIS2.0\resources\views/dts/receiver/contents/received/sections/received_table.blade.php ENDPATH**/ ?>