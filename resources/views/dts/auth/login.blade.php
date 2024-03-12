<!DOCTYPE html>
<html lang="en">

<head>
    
	@include('dts.auth.includes.meta')
	<title>DTS Login</title>
    @include('dts.auth.includes.css')
</head>

<body>
	<main class="d-flex w-100" >
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">


						<div class="card">
							<div class="card-body">
								<a href="{{url('/')}}"><i class="fas fa-arrow-left"></i></a>
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
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" autocomplete required />
										</div>
										<div class="g-recaptcha mt-4" data-sitekey={{config('services.recaptcha.key')}}></div>
										
										<div class="d-grid gap-2 mt-3">
											<button type="submit" class="btn btn-lg btn-primary">Submit</button>
									

										</div>

										<!-- <div class="d-grid gap-2 mt-1">
											<a href="{{url('/dts/track')}}" class="btn btn-lg btn-success">Track Documents</a>
										</div> -->
									</form>
								</div>
							</div>
						</div>
						
						<div class="text-center mb-3 text-white">
							Don't have an account? <a href="{{url('/dts/register')}}">Sign up</a>
						</div>
					</div>
				</div>
			</div>
		</div>


	</main>

	

</body>

@include('dts.auth.includes.js')
<script async src="https://www.google.com/recaptcha/api.js"></script>
<script type="text/javascript">

$('#login_form').on('submit', function (e) {
   e.preventDefault();
   $.ajax({
      url: base_url + '/v-u',
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

         }
      },
      error: function () {
		Swal.close();
		alert('Something Wrong!')
      }

   });
});
	
</script>

</html>