<div class="card flex-fill p-3">
         <div class="card-header">
            <h5 class="card-title mb-0">Documents</h5>
         </div>
         <table class="table table-hover table-striped " id="datatables-buttons" style="width: 100%; "  >
            <thead>
               <tr>
                  <th class="">Action</th>
                  <th class="">Tracking Number</th>
                  <th class="">Document Name</th>
                  <th class="">From</th>
                  <th class="">Document Type</th>
                  <th class="">Remarks</th>
                  <th class="">Released Date - Time</th>
                  
               </tr>
            </thead>
            <tbody>

              <?php foreach ($incoming_documents as $row) :  ?>
                <tr>
                  <td>    
                     <a class="btn btn-success received_document" data-track="{{$row['tracking_number']}}"  data-id="{{$row['history_id']}}"><i class="fas fa-hand"></i></a>       
                  </td>
                  <td>{{$row['tracking_number']}}</td>
                  <td><a href="{{url('/dts/user/view?tn='.$row['tracking_number'])}}" data-toggle="tooltip" data-placement="top" title="View <?php echo $row['tracking_number'] ?>"><?php echo $row['document_name']; ?></a></td>
                  <td>{{$row['from']}}</td>
                  <td>{{$row['type_name']}}</td>
                  <td><a href="javascript:;" id="view_remarks" data-remarks="{{$row['remarks']}}">View Remarks</a></td>
                  <td>{{$row['released_date']}}</td>
                 
                </tr>
              <?php endforeach; ?> 
            </tbody>
         </table>
      </div>




