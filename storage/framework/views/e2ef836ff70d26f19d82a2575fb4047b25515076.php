<hr>
<div class="mb-3">
   <h1 class="h3 d-inline align-middle"><?php echo e($gender_title); ?></h1>
</div>
<div class="row">
   <div class="col-xl-12 col-xxl-12 d-flex">
      <div class="w-100">
         <div class="row">
            <div class="col-sm-3">
               <div class="card " style="background-color: rgb(41,134,204);">
                  <div class="card-body">
                     <div class="row">
                        <div class="col mt-0">
                           <h5 class="card-title text-white">Total Male</h5>
                        </div>
                        <div class="col-auto">
                           <div class="stat text-primary">
                              <i class="align-middle fa fa-male" ></i>
                           </div>
                        </div>
                     </div>
                     <h1 class="mt-1 mb-3 text-white"><?php echo e($count['total_male']); ?></h1>
                  </div>
               </div>
            </div>
            <div class="col-sm-3">
               <div class="card " style="background-color: rgb(201,0,118);">
                  <div class="card-body">
                     <div class="row">
                        <div class="col mt-0">
                           <h5 class="card-title text-white">Total Female</h5>
                        </div>
                        <div class="col-auto">
                           <div class="stat text-primary">
                              <i class="align-middle fa fa-female" ></i>
                           </div>
                        </div>
                     </div>
                     <h1 class="mt-1 mb-3 text-white"><?php echo e($count['total_female']); ?></h1>
                  </div>
               </div>
            </div>




         </div>
      </div>
   </div>
</div>

<div class="row mt-2">
    <div class="col-lg-12 mt-sm-30 mt-xs-30">
        <div class="card">
            <div class="card-body">
            <div class="col-md-6 pull-right ">
                    <select class="custom-select form-control" id="admin_year" onchange="load_graph(this)">
                        <?php for ($i = 2023; $i <= 2030; $i++) {

                            $selected = $i == date('Y') ? "selected" : "";

                            echo '<option ' . $selected . '>' . $i . '</option>';

                        } ?>
                    </select>
                </div>
                <canvas id="admin-bar-gender-by-month-chart" height="100">></canvas>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/watchlisted/admin/contents/dashboard/sections/count1.blade.php ENDPATH**/ ?>