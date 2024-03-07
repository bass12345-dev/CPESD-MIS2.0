
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <?php echo $__env->make('dts.users.contents.profile.sections.profile_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<?php echo $__env->make('dts.includes.modals.view_profile_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('dts.users.contents.profile.sections.check_password_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('dts.users.contents.profile.sections.update_password_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
    $('#update_user_form').on('submit', function (e) {
        e.preventDefault();
        var form = $(this).serialize();
        var id = $('input[name=id]').val();
        var url = '/dts/us/update-profile';
        update_item(id,form,url);

        $('#update_user_form').find('button').attr('disabled', true);
    });

    $('#check_old_password_form').on('submit', function (e) {

        e.preventDefault();
        
        $.ajax({
            url: base_url + '/dts/us/ck',
            method: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            beforeSend: function () {
            Swal.showLoading()
            },
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            success: function (data) {
            
            if (data.response) {
                Swal.close();
                $('#check_password_modal').modal('hide')
                $('#update_password_modal').modal('show')
            } else {
                Swal.close();
                alert(data.message)

            }
            },
            error: function () {
                Swal.close();
            alert('something Wrong')
            }

            });
       
    });


    $('#update_password_form').on('submit', function (e) {
        e.preventDefault();

        var form = $(this).serialize();
        var id = '';
        var url = '/dts/us/u-p';
        update_item(id,form,url);

        

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dts.users.layout.user_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/users/contents/profile/profile.blade.php ENDPATH**/ ?>