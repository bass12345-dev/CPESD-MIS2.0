<div class="card flex-fill p-3">
   <div class="card-header">
      <h5 class="card-title mb-0">Documents</h5>
      <button class="btn btn-primary mt-2" id="multiple_forward">Forward</button> 
      <button class="btn btn-danger mt-2" id="received_error">Received Error</button> 
      <!-- <button class="btn btn-secondary mt-2" id="outgoing">Outgoing</button>  -->
      <hr>
   </div>
   <table class="table table-hover table-striped " id="datatable_with_select" style="width: 100%; ">
      <thead>
         <tr>
            <th></th>
            <th>#</th>
            <th>Tracking Number</th>
            <th>Document Name</th>
            <th>Document Type</th>
            <th>Remarks</th>
            <th>Received Date - Time</th>
            <!-- <th>Actions</th> -->
         </tr>
      </thead>
      <tbody>
         <?php $i=1; foreach ($received_documents as $row) : ?>
            <tr>
               <td><?php echo $row['history_id'].'-'.$row['tracking_number'] ?></td>
               <td><?php echo e($i++); ?></td>
               <td><?php echo e($row['tracking_number']); ?></td>
               <td><a href="<?php echo e(url('/dts/user/view?tn='.$row['tracking_number'])); ?>" data-toggle="tooltip" data-placement="top" title="View <?php echo $row['tracking_number'] ?>"><?php echo $row['document_name']; ?></a></td>
               <td><?php echo e($row['type_name']); ?></td>
               <td><a href="javascript:;" id="view_remarks" data-remarks="<?php echo e($row['remarks']); ?>">View Remarks</a></td>
               <td><?php echo e($row['received_date']); ?></td>
               <!-- <td>
                  <div class="btn-group dropstart">
                     <i class="fa fa-ellipsis-v " class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"></i>
                     <ul class="dropdown-menu">

                        <li><a class="dropdown-item" id="forward_icon" href="#" data-history-id="<?php echo e($row['history_id']); ?>" data-tracking-number="<?php echo e($row['tracking_number']); ?>" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">Forward</a></li>
                        <li><a class="dropdown-item text-danger" id="received_error" href="javascript:;" data-tracking-number="<?php echo e($row['tracking_number']); ?>" data-history-id="<?php echo e($row['history_id']); ?>" >Received Error</a></li>
                     </ul>
                  </div>
               </td> -->
            </tr>
         <?php endforeach; ?>
      </tbody>
   </table>
</div><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/users/contents/received/sections/received_table.blade.php ENDPATH**/ ?>