<div class="row">
   <div class="col-sm-4">
      <div class="card">
         <div class="card-body l-bg-cherry ">
            <div class="row">
               <div class="col mt-0">
                  <h5 class="card-title text-white">Encoded Pending Documents</h5>
               </div>
               <div class="col-auto">
                  <div class="stat text-primary">
                     <i class="fas fa-file align-middle"></i>
                  </div>
               </div>
            </div>
            <h1 class="mt-1 mb-3 text-white">{{$count['pending']}}</h1>
         </div>
      </div>
   </div>

   <div class="col-sm-4">
      <div class="card">
         <div class="card-body bg-success ">
            <div class="row">
               <div class="col mt-0">
                  <h5 class="card-title text-white">Encoded Completed Documents</h5>
               </div>
               <div class="col-auto">
                  <div class="stat text-primary">
                     <i class="fas fa-file align-middle"></i>
                  </div>
               </div>
            </div>
            <h1 class="mt-1 mb-3 text-white">{{$count['completed']}}</h1>
         </div>
      </div>
   </div>
   <div class="col-sm-4">
      <div class="card">
            <div class="card-body bg-warning ">
               <div class="row">
                  <div class="col mt-0">
                     <h5 class="card-title text-white">Encoded Cancelled Documents</h5>
                  </div>
                  <div class="col-auto">
                     <div class="stat text-primary">
                        <i class="fas fa-file align-middle"></i>
                     </div>
                  </div>
               </div>
               <h1 class="mt-1 mb-3 text-white">{{$count['cancelled']}}</h1>
            </div>
         </div>
   </div>
</div>
</div>
<div class="row">
   <div class="col-xl-12 col-xxl-12 d-flex">
      <div class="w-100">
         <div class="row">
            <div class="col-sm-3">
               <div class="card">
                  <div class="card-body">
                     <div class="row">
                        <div class="col mt-0">
                           <h5 class="card-title text-black">My Documents</h5>
                        </div>
                        <div class="col-auto">
                           <div class="stat text-primary">
                              <i class="align-middle" data-feather="file"></i>
                           </div>
                        </div>
                     </div>
                     <h1 class="mt-1 mb-3">{{$count['count_documents']}}</h1>
                  </div>
               </div>
            </div>
            <div class="col-sm-3">
               <div class="card">
                  <div class="card-body">
                     <div class="row">
                        <div class="col mt-0">
                           <h5 class="card-title text-black">Forwarded</h5>
                        </div>
                        <div class="col-auto">
                           <div class="stat text-primary">
                              <i class="align-middle" data-feather="arrow-up"></i>
                           </div>
                        </div>
                     </div>
                     <h1 class="mt-1 mb-3">{{$count['forwarded']}}</h1>
                  </div>
               </div>
            </div>
            <div class="col-sm-3">
               <div class="card">
                  <div class="card-body">
                     <div class="row">
                        <div class="col mt-0">
                           <h5 class="card-title text-black">Received</h5>
                        </div>
                        <div class="col-auto">
                           <div class="stat text-primary">
                              <i class="align-middle" data-feather="arrow-down"></i>
                           </div>
                        </div>
                     </div>
                     <h1 class="mt-1 mb-3">{{$count['received']}}</h1>
                  </div>
               </div>
            </div>
            <div class="col-sm-3">
               <div class="card">
                  <div class="card-body">
                     <div class="row">
                        <div class="col mt-0">
                           <h5 class="card-title text-black">Incoming</h5>
                        </div>
                        <div class="col-auto">
                           <div class="stat text-primary">
                              <i class="align-middle" data-feather="arrow-left"></i>
                           </div>
                        </div>
                     </div>
                     <h1 class="mt-1 mb-3">{{$count['incoming']}}</h1>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

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
                              <th class="text-center">#</th>
                              <th class="text-center">Tracking Number</th>
                              <th class="text-center">Document Name</th>
                              <th class="text-center">Type</th>
                              <th class="text-center">Transaction Type</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $i =1; foreach($count['added_today'] as $row) {
                               ?>
                           <tr>
                              <th class="text-center">{{$i++}}</th>
                              <td class="text-center">{{$row->tracking_number}}</td>
                              <td class="text-center">{{$row->document_name}}</td>
                              <td class="text-center">{{$row->type_name}}</td>
                              <td class="text-center">{{$row->destination_type}}</td>
                           </tr>
                          <?php } ?>
                        </tbody>
                     </table>
                  </div>
               </div>

            </div>

         </div>
      </div>
   </div>
</div>