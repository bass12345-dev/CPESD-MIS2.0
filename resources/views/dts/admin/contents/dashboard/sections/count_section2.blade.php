<div class="row">
   <div class="col-xl-12 col-xxl-12 d-flex">
      <div class="w-100">
         <div class="row">
            <div class="col-sm-8">
               <div>
                  <div class="card">
                     <div class="card-header bg-primary text-white">
                        Document Added Today - {{$today}}
                     </div>
                     <table class="table">
                        <thead>
                           <tr>
                              <th scope="col">#</th>
                              <th scope="col">Tracking Number</th>
                              <th scope="col">Document Name</th>
                              <th scope="col">Document Type</th>
                              <th scope="col">Transaction Type</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php foreach($count['added_today'] as $row) {
                              $i =1; ?>
                           <tr>
                              <th scope="row">{{$i++}}</th>
                              <td>{{$row->tracking_number}}</td>
                              <td>{{$row->document_name}}</td>
                              <td>{{$row->type_name}}</td>
                              <td>{{$row->destination_type}}</td>
                           </tr>
                          <?php } ?>
                        </tbody>
                     </table>
                  </div>
               </div>

            </div>

            
            <div class="col-sm-4">

            <div>
                  <div class="card" >
                     <div class="card-header bg-danger text-white">
                       Users Logged in Status
                     </div>
                     <ul class="list-group list-group-flush">
                       <?php foreach($inactive as $row): ?>
                        <li class="list-group-item text-danger">{{$row}}</li>
                       <?php endforeach; ?>
                     </ul>
                  </div>
               </div>

            </div>

            
         </div>
      </div>
   </div>
</div>