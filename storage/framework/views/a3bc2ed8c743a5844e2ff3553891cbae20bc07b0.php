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
            <h1 class="mt-1 mb-3 text-white"><?php echo e($count['pending']); ?></h1>
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
            <h1 class="mt-1 mb-3 text-white"><?php echo e($count['completed']); ?></h1>
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
               <h1 class="mt-1 mb-3 text-white"><?php echo e($count['cancelled']); ?></h1>
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
                     <h1 class="mt-1 mb-3"><?php echo e($count['count_documents']); ?></h1>
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
                     <h1 class="mt-1 mb-3"><?php echo e($count['forwarded']); ?></h1>
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
                     <h1 class="mt-1 mb-3"><?php echo e($count['received']); ?></h1>
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
                     <h1 class="mt-1 mb-3"><?php echo e($count['incoming']); ?></h1>
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
                        Added Document Today
                     </div>
                     <table class="table">
                        <thead>
                           <tr>
                              <th scope="col">#</th>
                              <th scope="col">Tracking Number</th>
                              <th scope="col">Document Name</th>
                              <th scope="col">Type</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php foreach($count['added_today'] as $row) {
                              $i =1; ?>
                           <tr>
                              <th scope="row"><?php echo e($i++); ?></th>
                              <td><?php echo e($row->tracking_number); ?></td>
                              <td><?php echo e($row->document_name); ?></td>
                              <td><?php echo e($row->type_name); ?></td>
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
</div><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/users/contents/dashboard/sections/count_section.blade.php ENDPATH**/ ?>