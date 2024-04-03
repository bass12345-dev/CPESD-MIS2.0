<div class="card flex-fill p-3">
   <div class="card-header">
      <h5 class="card-title mb-3">Documents</h5>
      <a class="btn btn-primary" href="javascript:;" id="print_slips"><i class="fas fa-print"></i> Tracking Slips</a>
      <hr>
   </div>
   <!-- @include('dts.users.contents.my_documents.sections.filter.filter') -->
   <table class="table table-hover table-striped " id="datatables-buttons" style="width: 100%; "  >
      <thead>
         <tr>
            <th class=""><input type="checkbox" name="check_all" value="true"></th>
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
            <td><input type="checkbox" name="document_id" value="<?php echo $row['document_id'] ?>"></td>
            <td>{{$i++}}</td>
            <td><?php echo $row['tracking_number']; ?></td>
            <td><a href="{{url('/dts/user/view?tn='.$row['tracking_number'])}}" data-toggle="tooltip" data-placement="top" title="View <?php echo $row['tracking_number'] ?>"><?php echo $row['document_name']; ?></a> </td>
            <td><?php echo $row['type_name']; ?></td>
            <td><?php echo $row['created']; ?></td>
            <td><?php echo $row['is']; ?></td>
            <td>
               <div class="btn-group dropstart">
                  <i class="fa fa-ellipsis-v " class="dropdown-toggle"  data-bs-toggle="dropdown" aria-expanded="false"></i>
                  <ul class="dropdown-menu">
                     
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
                     <li><a class="dropdown-item print_button" 
                        data-id              ="<?php echo $row['document_id']  ?>" 
                        data-track           ="<?php echo $row['tracking_number']  ?>" 
                        data-name            ="<?php echo $row['document_name']  ?>" 
                        data-type            ="<?php echo $row['document_type_name']  ?>" 
                        data-description     ="<?php echo $row['description']  ?>" 
                        data-destination     ="<?php echo $row['destination_type']  ?>" 
                        data-received        ="<?php echo $row['created']; ?>"
                        data-encoded-by      ="<?php echo  $row['encoded_by']; ?>"
                        data-origin          ="<?php echo  $row['origin']; ?>"
                        href="javascript:;" >Print Tracking Slip</a></li>
                  </ul>
               </div>
            </td>
         </tr>
         <?php endforeach; ?>    
      </tbody>
   </table>
</div>