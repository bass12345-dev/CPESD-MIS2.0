<div class="row">
    <div class="col-md-6">

        <div class="card mb-3">
            <div class="card-header">
                <h5 class="card-title mb-0">Current OIC</h5>
            </div>
            <div class="card-body text-center">
                <br>
                <h2 class="card-title " style="color:#000;"><?php echo e($oic->first_name.'
                    '.$oic->middle_name.' '.$oic->last_name.' '.$oic->extension); ?></h2>
               

            </div>



        </div>


    </div>
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="card-body ">

                <form id="update_oic_form">
                    <div class="form-group col-md-12 mb-3">
                        <label class="mb-2">Update Office In Charge</label>
                        <div class="mb-2">
                            <input type="hidden" value="<?php echo e($oic->user_id); ?>" name="oic_id">
                            <select class="form-control" name="user_id" required>
                                <option value="">Select OIC</option>
                                <?php foreach ($users as $row) {
                                ?>
                                    <option value="<?php echo e($row->user_id); ?>"><?php echo e($row->first_name); ?> <?php echo e($row->middle_name); ?>

                                        <?php echo e($row->last_name); ?> <?php echo e($row->extension); ?>

                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/admin/contents/set_receiver/sections/set_oic_form.blade.php ENDPATH**/ ?>