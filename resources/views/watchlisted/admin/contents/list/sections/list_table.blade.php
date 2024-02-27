<div class="card flex-fill p-3">
         <div class="card-header">
            <h5 class="card-title mb-2">Documents</h5>
            <button class="btn btn-warning" id="remove"> Remove</button>

         </div>
         

         <table class="table table-hover table-striped " id="datatables-buttons" style="width: 100%; "  >
            <thead>
               <tr>
                  <th class=""><input type="checkbox" name="check_all" value="true"></th>   
                  <th>#</th>
                  <th>Name</th>
                  <th>Age</th>
                  <th>Address</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Actions</th>
               </tr>
            </thead>
            <tbody>

                <?php
                   $i = 1;
                   foreach ($list as $row) :?>
                     <tr>
                        <td><input type="checkbox" name="person_id" value="{{$row->person_id}}"></td>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row->first_name.' '.$row->middle_name.' '.$row->last_name.' '.$row->extension; ?></td>
                        <td><?php echo $row->age; ?></td>
                        <td><?php echo $row->address; ?></td>
                        <td><?php echo $row->email_address; ?></td>
                        <td><?php echo $row->phone_number; ?></td>
                        <td> 
                           <a href="{{url('/watchlisted/admin/view_profile?id='.$row->person_id)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>   
                            
                        </td>
                       
                     </tr>
                <?php endforeach; ?>    
                  
            </tbody>
         </table>
      </div>




