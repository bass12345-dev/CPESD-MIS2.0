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
         <td>Office</td>
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

</div><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/admin/contents/view/sections/document_information.blade.php ENDPATH**/ ?>