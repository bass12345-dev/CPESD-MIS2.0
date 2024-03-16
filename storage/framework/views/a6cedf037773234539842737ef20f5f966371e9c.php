<div class="col-sm-4">

            <div>
                  <div class="card" >
                     <div class="card-header bg-danger text-white">
                       Users Logged in Status
                     </div>
                     <ul class="list-group list-group-flush">
                       <?php foreach($inactive as $row): ?>
                        <li class="list-group-item text-danger"><?php echo e($row); ?></li>
                       <?php endforeach; ?>
                     </ul>
                  </div>
               </div>

            </div><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/admin/contents/dashboard/sections/more/user_login_status.blade.php ENDPATH**/ ?>