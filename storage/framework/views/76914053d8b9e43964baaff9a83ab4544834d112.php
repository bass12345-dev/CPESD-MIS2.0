<div class="row">
   <div class="col-xl-12 col-xxl-12 d-flex">
      <div class="w-100">
         <div class="row">
            <div class="col-sm-7">
               <div>
               <ul class="nav nav-tabs" role="tablist">
                     <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="simple-tab-0" data-bs-toggle="tab" href="#simple-tabpanel-0" role="tab" aria-controls="simple-tabpanel-0" aria-selected="true"> Added Today</a>
                     </li>
                     <li class="nav-item" role="presentation">
                        <a class="nav-link" id="simple-tab-1" data-bs-toggle="tab" href="#simple-tabpanel-1" role="tab" aria-controls="simple-tabpanel-1" aria-selected="false">Approved Today</a>
                     </li>

                     <li class="nav-item" role="presentation">
                        <a class="nav-link" id="simple-tab-1" data-bs-toggle="tab" href="#simple-tabpanel-2" role="tab" aria-controls="simple-tabpanel-2" aria-selected="false">Latest Approved</a>
                     </li>
                     
                     </ul>
                     <div class="tab-content pt-5" id="tab-content">
                     <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
                           <?php echo $__env->make('watchlisted.admin.contents.dashboard.sections.tabs.added_today', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                     </div>
                     <div class="tab-pane" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
                           <?php echo $__env->make('watchlisted.admin.contents.dashboard.sections.tabs.approved_today', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                     </div>
                     <div class="tab-pane" id="simple-tabpanel-2" role="tabpanel" aria-labelledby="simple-tab-1">
                           <?php echo $__env->make('watchlisted.admin.contents.dashboard.sections.tabs.latest_approved', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                     </div>
                     </div>
                
               </div>

            </div>
            <div class="col-sm-5">
          
            </div>

            
         </div>
      </div>
   </div>
</div><?php /**PATH C:\xampp\htdocs\CPESD-MIS2.0\resources\views/watchlisted/admin/contents/dashboard/sections/latest_tabs.blade.php ENDPATH**/ ?>