<div class="row">
   <div class="col-md-6">
      <div class="card flex-fill p-3">
         <div class="card-header">
            <h5 class="card-title mb-0">Information</h5>
         </div>
         <table class="table table-hover table-striped " style="width: 100%; ">
            <tr>
               <td>Document Name</td>
               <td class="text-start"><?php echo e($doc_data['document_name']); ?></td>
            </tr>
            <tr>
               <td>Tracking Number</td>
               <td><?php echo e($doc_data['tracking_number']); ?></td>
            </tr>
            <tr>
               <td>Encoded/Added By</td>
               <td><?php echo e($doc_data['encoded_by']); ?></td>
            </tr>
            <tr>
               <td>Origin</td>
               <td><?php echo e($doc_data['office']); ?></td>
            </tr>

            <tr>
               <td>Document Type</td>
               <td><?php echo e($doc_data['document_type']); ?></td>
            </tr>
            <tr>
               <td>Description</td>
               <td><?php echo e($doc_data['description']); ?></td>
            </tr>
            <tr>
               <td>Type</td>
               <td><?php echo e($doc_data['destination_type']); ?></td>
            </tr>
            <tr>
               <td>Qr Code</td>
               <td><img src="<?php echo e($doc_data['qr']); ?>"></td>
            </tr>
            <tr>
               <td>Status</td>
               <td><?php echo $doc_data['status'] ?></td>
            </tr>
            
         </table>

      </div>
   </div>
   <div class="col-md-6">
   <div class="card flex-fill p-3">
   <div class="card-header">
            <h5 class="card-title mb-0">Outgoing History</h5>
         </div>
      <table class="table table-hover table-striped " id="datatables-buttons" style="width: 100%; "  >
            <thead>
               <tr>
                
                  <th >Person Responsible</th>
                  <th >Office</th>
                  <th >Remarks</th>
                  <th>Status</th>
                  <th>Outgoing Date</th>
                  <th>Date Returned</th>

               </tr>
            </thead>
            <tbody>
            <?php foreach ($outgoing_history as $row) : ?>
               <tr>
                  <td><?php echo e($row->first_name); ?> <?php echo e($row->middle_name); ?> <?php echo e($row->last_name); ?> <?php echo e($row->extension); ?></td>
                  <td><?php echo e($row->office); ?></td>
                  <td><a href="javascript:;" id="view_remarks" data-remarks="<?php echo e($row->remarks); ?>">View Remarks</a></td>
                  <td><?php
                        $status = $row->status == 'return' ? '<span class="badge bg-success">Returned</span>' : '<span class="badge bg-danger">Pending</span>';
                        echo $status;
                  ?></td>
                  <td><?php echo e(date('M d Y', strtotime($row->outgoing_date))); ?></td>
                  <td><?php echo $row->outgoing_date_received != null ? date('M d Y', strtotime($row->outgoing_date)) :  '-'; ?></td>
               </tr>
            <?php 
            endforeach; ?>
            </tbody>
      </table>
   </div>
   </div>
</div><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/users/contents/track/sections/document_information.blade.php ENDPATH**/ ?>