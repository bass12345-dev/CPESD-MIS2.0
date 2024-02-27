<div class="card flex-fill p-2">
   <div class="card-header">
      <h5 class="card-title mb-2">Documents</h5>
      <button class="btn btn-danger" id="delete"> Delete</button>
   </div>
   <!-- <div class="d-flex flex-row ">
      <div class="p-1" style="width: 45%;">
         <div class="input-group mb-3">
            <input type="text" class="form-control" name="dates" placeholder="Date Range"
               aria-describedby="button-addon2">
            <button class="btn btn-outline-primary" type="button" id="button-addon2"><i
                  class="fas fa-calendar"></i></button>
         </div>
      </div>
      <div class="p-1" style="width: 45%;">
         <select class="form-control" name="select_document_types">
            <option value="">Select Document Type</option>
            <?php foreach ($document_types as $row) : ?>
               
               <option value="{{$row->type_id}}">{{$row->type_name}}</option>
      
            <?php endforeach; ?>
            
         </select>
      </div>
      <div class="p-1" >
         <button class="btn btn-primary btn-block"   id="filter">Filter</button>
      </div>
      </div> -->
   <div class="row p-2 m-1">
   </div>
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
               <?php echo $row['document_name']; ?>
            </td>
            <td>
               <?php echo $row['type_name']; ?>
            </td>
            <td>
               <?php echo $row['created']; ?>
            </td>
            <td>
               <?php echo $row['is'] == 'Pending' ? '<span class="badge p-2 bg-danger">Pending</span>' : '<span class="badge p-2 bg-success">Completed</span>'; ?>
            </td>
            <td>
               <a href="{{url('/dts/admin/view?tn='.$row['tracking_number'])}}" class="m-2"><i
                  class="fas fa-eye"></i></a>
               <?php if($row['history_status'] != 'completed' ) { ?>
               <a id="forward_icon" href="#" data-history-id="{{$row['history_id']}}"
                  data-tracking-number="{{$row['tracking_number']}}" data- data-bs-toggle="offcanvas"
                  data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"><i
                  class="fas fa-check text-success"></i></a>
               <?php } ?>
            </td>
         </tr>
         <?php endforeach; ?>
      </tbody>
   </table>
</div>