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
                  <td>{{$row['tracking_number']}}</td>
                  <td><a href="{{url('/dts/user/view?tn='.$row['tracking_number'])}}" data-toggle="tooltip" data-placement="top" title="View <?php echo $row['tracking_number'] ?>"><?php echo $row['document_name']; ?></a></td>
                  <td>{{$row['forwarded_to']}}</td>
                  <td>{{$row['type_name']}}</td>
                  <td><a href="javascript:;" id="view_remarks"   data-remarks="{{$row['remarks']}}" >View Remarks</a><br> 
                     <a href="javascript:;" id="update_remarks" class="text-success" data-history-id="{{$row['history_id']}}" data-remarks="{{$row['remarks']}}" >Update Remarks</a>
                  </td>
                  <td>{{$row['released_date']}}</td>
                  <!-- <td><a href="{{url('/dts/user/view?tn='.$row['tracking_number'])}}" class="m-2"><i
                  class="fas fa-eye"></i></a></td> -->
                  <td>    
                           <div class="btn-group dropstart">
                             <i class="fa fa-ellipsis-v " class="dropdown-toggle"  data-bs-toggle="dropdown" aria-expanded="false"></i>
                             <ul class="dropdown-menu">
                                  <li><a class="dropdown-item " id="forward_icon" data-remarks="{{$row['remarks']}}" data-history-id="{{$row['history_id']}}" data-tracking-number="{{$row['tracking_number']}}"  href="javascript:;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" >Update Forward To</a></li>
                                 
                                </ul>
                           </div>
                        </td>
                 
                </tr>
              <?php endforeach; ?> 
            </tbody>
         </table>
      </div>




