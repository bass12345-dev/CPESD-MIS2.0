<div class="card flex-fill p-3">
         <div class="card-header">
            <h5 class="card-title mb-0">Documents</h5>
         </div>
         <table class="table table-hover table-striped " id="datatables-buttons" style="width: 100%; "  >
            <thead>
               <tr>
                
                  <th class="">Tracking Number</th>
                  <th class="">Document Name</th>
                  <th class="">From</th>
                  <th class="">Document Type</th>
                  <th class="">Remarks</th>
                  <th class="">Released Date - Time</th>
                  <th class="">Action</th>
               </tr>
            </thead>
            <tbody>

              <?php foreach ($incoming_documents as $row) :  ?>
                <tr>
                  <td><?php echo e($row['tracking_number']); ?></td>
                  <td><?php echo e($row['document_name']); ?></td>
                  <td><?php echo e($row['from']); ?></td>
                  <td><?php echo e($row['type_name']); ?></td>
                  <td><a href="javascript:;" >View Remarks</a></td>
                  <td><?php echo e($row['released_date']); ?></td>
                  <td>    
                           <div class="btn-group dropstart">
                             <i class="fa fa-ellipsis-v " class="dropdown-toggle"  data-bs-toggle="dropdown" aria-expanded="false"></i>
                             <ul class="dropdown-menu">
                                  <li><a class="dropdown-item received_document"   href="#" data-id="<?php echo e($row['history_id']); ?>">Received</a></li>
                                  <li><a class="dropdown-item" href="<?php echo e(url('/dts/user/view?tn='.$row['tracking_number'])); ?>">View Information</a></li>
                                </ul>
                           </div>
                        </td>
                </tr>
              <?php endforeach; ?> 
            </tbody>
         </table>
      </div>
<?php /**PATH C:\xampp\htdocs\CPESD-MIS2.0\resources\views/dts/receiver/contents/incoming/sections/incoming_table.blade.php ENDPATH**/ ?>