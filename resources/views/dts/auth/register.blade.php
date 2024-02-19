<!DOCTYPE html>
<html lang="en">

<head>
    
	@include('dts.auth.includes.meta')
	<title>DTS Register</title>
    @include('dts.auth.includes.css')
</head>

<body>
	<main class="d-flex w-100 mt-5" >
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

                    <div class="card">
							<div class="card-body">
								<a href="{{url('/dts')}}"><i class="fas fa-arrow-left"></i></a>
								<div class="text-center mt-4">

									<h1 class="h2 text-black">Register</h1>
									
								</div>
								<div class="m-sm-3">
									<form id="register_form">
                                        <div class="row ">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">First Name<span class="text-danger">*</span></label>
											    <input class="form-control form-control-lg" type="text" name="first_name" required />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Middle Name</label>
											    <input class="form-control form-control-lg" type="text" name="middle_name"  />
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Last Name<span class="text-danger">*</span></label>
                                                <input class="form-control form-control-lg" type="text" name="last_name" required  />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Jr Sr ... Extension</label>
                                                <input class="form-control form-control-lg" type="text" name="extension"  />
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Contact Number</label>
											    <input class="form-control form-control-lg" type="number" name="contact_number"  />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Email Address </label>
											    <input class="form-control form-control-lg" type="email" name="email"  />
                                            </div>
                                        </div>


                                        <div class="row ">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Barangay<span class="text-danger">*</span></label>
											    <select class="form-control" name="address" required>
                                                    <option value="">Select Barangay</option>
                                                    <?php
                                                        foreach($barangay as $row):

                                                    ?>
                                                    <option value="{{$row}}">{{$row}}</option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                    <label class="form-label">Office<span class="text-danger">*</span></label>
											        <select class="form-control" name="office" required>
                                                        <option value="21">Peso Office</option>
                                                    </select>
                                            </div>
                                        </div>
										
										<div class="mb-3">
											<label class="form-label">Username</label>
											<input class="form-control form-control-lg" type="text" name="user_name" required  />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password"  required />
										</div>
										<div class="mb-3">
											<label class="form-label">Confirm Password</label>
											<input class="form-control form-control-lg" type="password" name="confirm_password"  required />
										</div>
									

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

					
					</div>
				</div>
			</div>
		</div>


	</main>

	

</body>

@include('dts.auth.includes.js')

<script>
    $('#register_form').on('submit', function (e) {
   e.preventDefault();
   $.ajax({
      url: base_url + '/r-u',
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
		alert('Something Wrong!')
      }

   });
});
</script>


</html>