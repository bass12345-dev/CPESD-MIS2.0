
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-md-6">

        <div class="card mb-3">
            <div class="card-header">
                <h5 class="card-title mb-0">Current Receiver</h5>
            </div>
            <div class="card-body text-center">

                <h2 class="card-title mb-0 " style="color:#000;"><?php echo e($receiver->first_name.'
                    '.$receiver->middle_name.' '.$receiver->last_name.' '.$receiver->extension); ?></h2>
                <h3 class="card-title mb-0 text-muted"><?php echo e($receiver->username); ?></h3>

            </div>



        </div>


    </div>
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="card-body ">

                <form id="update_receiver_form">
                    <div class="form-group col-md-12 mb-3">
                        <label>Update Receiver</label>
                        <div class="mb-2">
                            <input type="hidden" value="<?php echo e($receiver->user_id); ?>" name="receiver_id">
                            <select class="form-control" name="user_id" required>
                                <option value="">Select Receiver</option>
                                <?php foreach ($users as $row) {
                                  ?>
                                <option value="<?php echo e($row->user_id); ?>"><?php echo e($row->first_name); ?> <?php echo e($row->middle_name); ?>

                                    <?php echo e($row->last_name); ?> <?php echo e($row->extension); ?></option>
                                <?php }?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
    $('#update_receiver_form').on('submit', function (e) {
      e.preventDefault();
      var form = $(this).serialize();
      var id = '';
      var url = '/dts/u-r';
      update_item(id,form,url);
     
      $('#update_receiver_form').find('button').attr('disabled',true);
   });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dts.admin.layout.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/admin/contents/set_receiver/set_receiver.blade.php ENDPATH**/ ?>