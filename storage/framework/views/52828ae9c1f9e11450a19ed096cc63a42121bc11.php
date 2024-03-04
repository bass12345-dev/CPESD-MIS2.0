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
                  <th>Actions</th>
               </tr>
            </thead>
            <tbody>

              <?php foreach ($forwarded_documents as $row) :  ?>
                <tr>
                  <td><?php echo e($row['tracking_number']); ?></td>
                  <td><a href="<?php echo e(url('/dts/user/view?tn='.$row['tracking_number'])); ?>" data-toggle="tooltip" data-placement="top" title="View <?php echo $row['tracking_number'] ?>"><?php echo $row['document_name']; ?></a></td>
                  <td><?php echo e($row['forwarded_to']); ?></td>
                  <td><?php echo e($row['type_name']); ?></td>
                  <td><a href="javascript:;" id="view_remarks"   data-remarks="<?php echo e($row['remarks']); ?>" >View Remarks</a><br> 
                     <a href="javascript:;" id="update_remarks" class="text-success" data-history-id="<?php echo e($row['history_id']); ?>" data-remarks="<?php echo e($row['remarks']); ?>" >Update Remarks</a>
                  </td>
                  <td><?php echo e($row['released_date']); ?></td>
                  <!-- <td><a href="<?php echo e(url('/dts/user/view?tn='.$row['tracking_number'])); ?>" class="m-2"><i
                  class="fas fa-eye"></i></a></td> -->
                  <td>    
                           <div class="btn-group dropstart">
                             <i class="fa fa-ellipsis-v " class="dropdown-toggle"  data-bs-toggle="dropdown" aria-expanded="false"></i>
                             <ul class="dropdown-menu">
                                  <li><a class="dropdown-item " id="forward_icon" data-remarks="<?php echo e($row['remarks']); ?>" data-history-id="<?php echo e($row['history_id']); ?>" data-tracking-number="<?php echo e($row['tracking_number']); ?>"  href="javascript:;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" >Update Forward To</a></li>
                                 
                                </ul>
                           </div>
                        </td>
                 
                </tr>
              <?php endforeach; ?> 
            </tbody>
         </table>
      </div>




<?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/users/contents/forwarded/sections/forwarded_table.blade.php ENDPATH**/ ?>