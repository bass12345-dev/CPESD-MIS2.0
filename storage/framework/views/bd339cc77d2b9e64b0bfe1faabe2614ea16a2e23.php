<!DOCTYPE html>
<html lang="en">

<head>

    <?php echo $__env->make('dts.auth.includes.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title>DTS Register</title>
    <?php echo $__env->make('dts.auth.includes.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <style>
        canvas {
  overflow-y: hidden;
  overflow-x: hidden;
  width: 100%;
  margin: 0;
  position: absolute;

}
    </style>
</head>

<body>
<canvas id="canvas" class="d-none"></canvas>
    <main class="d-flex w-100 mt-5">

        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="card">
                            <div class="card-body">
                                <a href="<?php echo e(url('/dts')); ?>"><i class="fas fa-arrow-left"></i></a>
                                <div class="text-center mt-4">

                                    <h1 class="h2 text-black">Register</h1>

                                </div>
                                <div class="m-sm-3">
                                    <form id="register_form">
                                        <div class="row ">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">First Name<span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control form-control-lg" type="text"
                                                    name="first_name" />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Middle Name</label>
                                                <input class="form-control form-control-lg" type="text"
                                                    name="middle_name" />
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Last Name<span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control form-control-lg" type="text"
                                                    name="last_name" />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Jr Sr ... Extension</label>
                                                <input class="form-control form-control-lg" type="text"
                                                    name="extension" />
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Contact Number <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control form-control-lg" type="number"
                                                    name="contact_number" />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Email Address <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control form-control-lg" type="email"
                                                    name="email_address" />
                                            </div>
                                        </div>


                                        <div class="row ">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Barangay<span
                                                        class="text-danger">*</span></label>
                                                <select class="form-select" name="address">
                                                    <option value="">Select Barangay</option>
                                                    <?php
                                                        foreach($barangay as $row):

                                                    ?>
                                                    <option value="<?php echo e($row); ?>"><?php echo e($row); ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Office<span
                                                        class="text-danger">*</span></label>
                                                <select class="form-select" name="office">
                                                    <option value="21">OCM-CPESD</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Username <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control form-control-lg" type="text" name="username" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control form-control-lg" type="password"
                                                name="password" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Confirm Password <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control form-control-lg" type="password"
                                                name="confirm_password" />
                                        </div>


                                        <div class="d-grid gap-2 mt-3">
                                            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                                        </div>
                                        <?php echo $__env->make('components.submit_loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>


    </main>



</body>

<?php echo $__env->make('dts.auth.includes.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    //   setTimeout(Draw, 2000)
$('#register_form').on('submit', function(e) {
    e.preventDefault();
    var form =  $('#register_form');
    $.ajax({
        url: base_url + '/r-u',
        method: 'POST',
        data: $(this).serialize(),
        dataType: 'json',
        beforeSend: function() {
           before(form);
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        success: function(data) {
           
            if(data.response){
                $('.submit-loader').addClass('d-none');
                $('#canvas').removeClass('d-none');
                Swal.fire({
                   position: "top-end",
                   icon: "success",
                   title: data.message,
                   showConfirmButton: false,
                   timer: 5000
                });
                $('#register_form')[0].reset();
                $('#register_form').find('button').prop('disabled',false);
               setTimeout(canvas_remove, 3000);
            }

        },
        error: function(err) {
            if (err.status == 422) { // when status code is 422, it's a validation issue
                $('#register_form').find('button').prop('disabled',false);
                $('.submit-loader').addClass('d-none');
                // // display errors on each form field
                $.each(err.responseJSON.errors, function(i, error) {
                    var el = $(document).find('[name="' + i + '"]');
                    el.after($('<span style="color: red;" class="error">' + error[0] +
                        '</span>'));

                });
            }
        }

    });
});
function canvas_remove() {
    $('#canvas').addClass('d-none');
}


</script>
<?php echo $__env->make('global_includes.js_.confetti', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</html><?php /**PATH C:\Apache24\htdocs\CPESD-MIS2.0\resources\views/dts/auth/register.blade.php ENDPATH**/ ?>