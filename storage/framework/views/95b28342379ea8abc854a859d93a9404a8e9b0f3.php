<div class="offcanvas offcanvas-end" style="width: 50%" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h3 class="offcanvas-title"></h3>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <form id="forward_form">
               <div class="form-row mb-2">
                
                   <input type="hidden" name="history_id">
                   <input type="hidden" name="tracking_number">
                   <div class="form-group col-md-12 mb-2">
                     <label for="inputEmail4">To : </label>
                     <select class="form-control" name="forward" required>
                       <option value="">Select..</option>
                       <option value="fr" class="bg-danger text-white">To Final Receiver</option>
                       <?php  foreach ($users as $row) : ?>
                        <?php $is_disabled = $row->user_id == $user_data->user_id ? 'disabled' : '';
                        ?>
                        <option value="<?php echo e($row->user_id); ?>" <?php echo e($is_disabled); ?> ><?php echo e($row->first_name); ?> <?php echo e($row->middle_name); ?> <?php echo e($row->last_name); ?> <?php echo e($row->extension); ?>  </option>
                       <?php endforeach; ?>

                       </select>
                     </select>
                  </div>
               </div>
               <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    
  </div>
</div><?php /**PATH C:\xampp\htdocs\CPESD-MIS2.0\resources\views/dts/users/contents/forwarded/sections/forward_offcanvas.blade.php ENDPATH**/ ?>