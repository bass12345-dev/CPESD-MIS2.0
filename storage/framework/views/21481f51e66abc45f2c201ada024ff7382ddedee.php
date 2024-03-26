<!DOCTYPE html>
<html lang="en">

<head>

	<?php echo $__env->make('dts.auth.includes.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<title>DTS Login</title>
	<?php echo $__env->make('dts.auth.includes.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">


						<div class="card">
							<div class="card-body">
								<a href="<?php echo e(url('/')); ?>"><i class="fas fa-arrow-left"></i></a>
								<div class="text-center mt-4">
									<h1 class="h2 text-black">Welcome back!</h1>
									<p class="lead text-black">
										Sign in to your account to continue

									</p>
								</div>
								<div class="m-sm-3">
									<form id="login_form">
										<div class="mb-3">
											<label class="form-label">Username</label>
											<input class="form-control form-control-lg" type="text" name="username" placeholder="Enter your Username" required />
										</div>
										<!-- <div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" autocomplete required />
										</div> -->
										<label class="form-label">Password</label>
										<div class="input-group flex-nowrap" style="height: 40px;">
											
											<input type="password" class="form-control password" name="password" placeholder="Enter your Password" aria-label="Password" aria-describedby="addon-wrapping">
											<span class="input-group-text show_con">
												<i class="fas fa-eye show_icon"></i>
												<i class="fas fa-eye-slash hidden_icon" hidden></i>
											</span>
										</div>
										<div class="g-recaptcha mt-4" data-sitekey=<?php echo e(config('services.recaptcha.key')); ?>></div>

										<div class="d-grid gap-2 mt-3">
											<button type="submit" class="btn btn-lg btn-primary">Submit</button>


										</div>

										<!-- <div class="d-grid gap-2 mt-1">
											<a href="<?php echo e(url('/dts/track')); ?>" class="btn btn-lg btn-success">Track Documents</a>
										</div> -->
									</form>
								</div>
							</div>
						</div>

						<div class="text-center mb-3 text-white">
							Don't have an account? <a href="<?php echo e(url('/dts/register')); ?>">Sign up</a>
						</div>
					</div>
				</div>
			</div>
		</div>


	</main>



</body>

<?php echo $__env->make('dts.auth.includes.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('global_includes.js_.global_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script type="text/javascript">
	$('#login_form').on('submit', function(e) {
		e.preventDefault();
		$.ajax({
			url: base_url + '/v-u',
			method: 'POST',
			data: $(this).serialize(),
			dataType: 'json',
			beforeSend: function() {
				Swal.showLoading()
			},
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
			},
			success: function(data) {
				Swal.close();
				if (data.response) {

					Swal.fire({
						position: "top-end",
						icon: "success",
						title: data.message,
						showConfirmButton: false,
						timer: 1500
					});
					location.reload();

				} else {

					alert(data.message)
					location.reload();
				}
			},
			error: function(data) {
				Swal.close();
				alert('Something Wrong!')
			}

		});
	});


	
</script>

</html><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/auth/login.blade.php ENDPATH**/ ?>