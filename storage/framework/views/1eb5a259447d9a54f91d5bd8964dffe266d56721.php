<div class="col-md-12 col-12   ">
    <div class="card mb-3">
        <div class="card-header">
            <h5 class="card-title mb-0">Profile Details</h5>
        </div>
        <div class="card-body text-center">

            <h2 class="card-title mb-0 " style="color:#000;"><?php echo e($title); ?></h2>
            <div class=" mb-2 badge bg-success text-white"> <?php echo e(strtoupper($user_data->user_type)); ?></div>
            <?php if(session('_id') == $user_data->user_id){ ?>
            <div>
                <a class="btn btn-primary btn-sm" href="#" data-bs-target="#view_profile_modal" data-bs-toggle="modal">Update Profile</a>
                <a class="btn btn-danger btn-sm" href="#" data-bs-target="#check_password_modal" data-bs-toggle="modal">
                    Update Password</a>
            </div>

            <?php } ?>
        </div>

        <hr class="my-0" />
        <div class="card-body">
            <h5 class="h6 card-title">About</h5>
            <ul class="list-unstyled mb-0">
                <li class="mb-1"><span data-feather="user" class="feather-sm me-1"></span>
                    <span= class="h4 m-2"><?php echo e($user_data->username); ?></span>
                </li>
                <li class="mb-1"><span data-feather="at-sign" class="feather-sm me-1"></span>
                    <span= class="h4 m-2"><?php echo e($user_data->email_address); ?></span>
                </li>

                <li class="mb-1"><span data-feather="phone" class="feather-sm me-1"></span>
                    <span= class="h4 m-2"><?php echo e($user_data->contact_number); ?></span>
                </li>


                <li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span>
                    <span= class="h4 m-2"><?php echo e($user_data->address); ?></span>
                </li>
            </ul>
        </div>

    </div>
</div><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/users/contents/profile/sections/profile_table.blade.php ENDPATH**/ ?>