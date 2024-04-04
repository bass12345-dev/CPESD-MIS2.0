<div class="card flex-fill p-2">
   <div class="card-header">
      <h5 class="card-title mb-2">Documents</h5>
      <button class="btn btn-danger" id="delete"> Delete</button>
      <button class="btn btn-warning" id="cancel"> Cancel</button>
      <button class="btn btn-primary" id="print_slips"> Print Tracking Slip</button>
      <hr>
   </div>
<!--   
   <div class="d-flex flex-row ">
      <div class="p-1" style="width: 45%;">
         <div class="input-group mb-3">
           
            <input type="text" class="form-control" name="dates"   placeholder="Date Range"
               aria-describedby="button-addon2" >
            <button class="btn btn-outline-primary" type="button" id="button-addon2"><i
                  class="fas fa-calendar"></i></button>
         </div>
      </div>
      <div class="p-1" style="width: 30%;">
         <select class="form-control" name="select_document_types">
            <option value="0">Select Document Type</option>
            <?php foreach ($document_types as $row) : ?>
               
               <option value="{{$row->type_id}}">{{$row->type_name}}</option>
      
            <?php endforeach; ?>
            
         </select>
      </div>
      <div class="p-1" style="width: 15%;">
         <select class="form-control" name="select_document_status">
            <option value="0">Select Status</option>
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
         </select>
      </div>
      <div class="p-1" >
         <button class="btn btn-primary btn-block"   id="filter">Filter</button>
      </div>
      </div> -->

   <table class="table table-hover table-striped m-2 " id="datatables-buttons" style="width: 100%; ">
      <thead>
         <tr>
            <th class=""><input type="checkbox" name="check_all" value="true"></th>
            <th class="">#</th>
            <th class="">Tracking Number</th>
            <th class="">Document Name</th>
            <th class="">Document Type</th>
            <th class="">Created</th>
            <th class="">Status</th>
            <th class="">Actions</th>
         </tr>
      </thead>
      <tbody>
         <?php
            $i = 1;
            foreach ($documents as $row) :?>
         <tr>
            <td><input type="checkbox" name="document_id" value="<?php echo $row['document_id'] ?>"></td>
            <td>
               <?php echo $i++; ?>
            </td>
            <td>
               <?php echo $row['tracking_number']; ?>
            </td>
            <td>
               <a href="{{url('/dts/admin/view?tn='.$row['tracking_number'])}}" class="{{$row['error']}}" data-toggle="tooltip" data-placement="top" title="View <?php echo $row['tracking_number'] ?>"><?php echo $row['document_name']; ?></a> 
            </td>
            <td>
               <?php echo $row['type_name']; ?>
            </td>
            <td>
               <?php echo $row['created']; ?>
            </td>
            <td>
               <?php echo $row['is'] ?>
            </td>

            <td>   
               <?php if($row['history_status'] != 'completed')  : ?> 
               <div class="btn-group dropstart">
                  
                  <i class="fa fa-ellipsis-v " class="dropdown-toggle"  data-bs-toggle="dropdown" aria-expanded="false"></i>
                  <ul class="dropdown-menu">
                     
                    
                     <?php if($row['history_status'] != 'pending' AND $row['history_status'] == 'cancelled' ) : ?>
                     <li><a class="dropdown-item" id="revert_document" href="#" data-history-id="{{$row['history_id']}}"
                  data-tracking-number="{{$row['tracking_number']}}">Revert</a></li>
                     <?php endif; ?>
                     <?php if($row['history_status'] != 'completed' AND $row['history_status'] == 'pending' AND $row['history_status'] != 'cancelled' ) : ?>
                     
                     <li><a class="dropdown-item" id="forward_icon" href="#" data-history-id="{{$row['history_id']}}"
                  data-tracking-number="{{$row['tracking_number']}}"data-bs-toggle="offcanvas"
                  data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">Complete Document</a></li>
                      <?php endif; ?>
                  </ul>               
               </div>      
               <?php endif; ?>
            </td>
           
         </tr>
         <?php endforeach; ?>
      </tbody>
   </table>
</div>

