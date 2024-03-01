<div class="card flex-fill p-3">
         <div class="card-header">
            <h5 class="card-title mb-0">Documents</h5>
         </div>
         <table class="table table-hover table-striped " id="datatables-buttons" style="width: 100%; "  >
            <thead>
               <tr>
                  <th >#</th>
                  <th >Tracking Number</th>
                  <th >Document Name</th>
                  <th >Document Type</th>
                  <th >Created</th>
                  <th >Status</th>
                  <th >Actions</th>
               </tr>
            </thead>
            <tbody>
                  <?php
                   $i = 1;
                   foreach ($documents as $row) :
                     $delete_button  = DB::table('history')->where('t_number', $row['tracking_number'])->count() > 1 ? true : false;
                     ?>
                     <tr>
                        <td><?php echo e($i++); ?></td>
                        <td><?php echo $row['tracking_number']; ?></td>
                        <td><?php echo $row['document_name']; ?></td>
                        <td><?php echo $row['type_name']; ?></td>
                        <td><?php echo $row['created']; ?></td>
                        <td><?php echo $row['is']; ?></td>
                        <td>    
                           <div class="btn-group dropstart">
                             <i class="fa fa-ellipsis-v " class="dropdown-toggle"  data-bs-toggle="dropdown" aria-expanded="false"></i>
                             <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="<?php echo e(url('/dts/user/view?tn='.$row['tracking_number'])); ?>">View </a></li>
                                  <!-- <?php 
                                       if($row['doc_status'] != 'cancelled'){
                                             echo ' <li><a class="dropdown-item cancel_document" href="javascript:;" data-id="'.$row['document_id'].'" data-track="'.$row['tracking_number'].'" >Cancel</a></li>';
                                       }
                                  ?> -->
                                 
                                  <li><a class="dropdown-item update_document" 
                                     data-tracking-number="<?php echo $row['tracking_number']  ?>" 
                                     data-name="<?php echo $row['document_name']  ?>" 
                                     data-type="<?php echo $row['doc_type']  ?>" 
                                     data-description="<?php echo $row['description']  ?>" 
                                     data-destination="<?php echo $row['destination_type']  ?>" 
                                     href="javascript:;" class="" data-bs-toggle="modal" data-bs-target="#update_document">Update</a></li>
                                  <?php if ($delete_button == false) {
                                     echo '
                                       <li><a class="dropdown-item remove_document" href="javascript:;" data-id="'.$row['document_id'].'" data-track="'.$row['tracking_number'].'"  >Remove</a></li>';
                                  } ?>

                                    <li><a class="dropdown-item print_document" 
                                     data-id="<?php echo $row['document_id']  ?>" 
                                     data-track="<?php echo $row['tracking_number']  ?>" 
                                     href="javascript:;" >Print Tracking Slip</a></li>
                                  
                                  
                                </ul>
                           </div>
                        </td>
                     </tr>
                <?php endforeach; ?>    
            </tbody>
         </table>
      </div>




<?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/users/contents/my_documents/sections/document_table.blade.php ENDPATH**/ ?>