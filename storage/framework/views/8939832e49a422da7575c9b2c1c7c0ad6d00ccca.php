<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="PESO OROQUIETA Watchlisted">
	<meta name="author" content="Basil John C. Mañabo">
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
	<meta name="keywords" content="PESO OROQUIETWatchlisted">
	<title>Watchlisted Login</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="<?php echo e(asset('assets/img/peso_logo.png')); ?>" />

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.min.css" rel="stylesheet">
	<link href=" <?php echo e(asset('assets/css/dts.css')); ?> " rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<style type="text/css">
		body {
			background-color: #9B4444;
			background-size: cover;
			height: 100vh;
		}
	</style>
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
									<h1 class="h2 text-black">Welcome back!!</h1>
									<!-- asset('assets/img/peso_logo.png') -->
									<img src="<?php echo e(asset('assets/img/icons8-eye.gif')); ?>">
								</div>
								<div class="m-sm-3">
									<form id="login_form">
										<div class="mb-3">

											<label class="form-label">Username</label>
											<input class="form-control form-control-lg" type="text" name="username" placeholder="Enter your Username" required />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<div class="input-group flex-nowrap" style="height: 40px;">

												<input type="password" class="form-control password" name="password" placeholder="Enter your Password" aria-label="Password" aria-describedby="addon-wrapping">
												<span class="input-group-text show_con">
													<i class="fas fa-eye show_icon"></i>
													<i class="fas fa-eye-slash hidden_icon" hidden></i>
												</span>
											</div>
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
			url: base_url + '/w-v-u',
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
						title: data.mes,
						showConfirmButton: false,
						timer: 1500
					});
					location.reload();

				} else {

					alert(data.message)
					location.reload();

				}
			},
			error: function() {
				Swal.close();
				alert('Something Wrong')
			}

		});
	});
</script>

</html><?php /**PATH C:\xampp\htdocs\CPESD-MIS2.0\resources\views/watchlisted/auth/new_user_login.blade.php ENDPATH**/ ?>