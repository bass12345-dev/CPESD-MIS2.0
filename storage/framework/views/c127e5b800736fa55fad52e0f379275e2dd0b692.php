
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('watchlisted.users.contents.add.sections.add_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
    	$('#add_document').on('submit', function (e) {
		e.preventDefault();
		var url = '/wl/user/a-p';
		var form = $(this).serialize();


		Swal.fire({
			title: "Review First Before Submitting",
			text: "",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Submit"
		}).then((result) => {
			if (result.isConfirmed) {
				
				$.ajax({
					url: base_url + url,
					method: 'POST',
					data: form,
					dataType: 'json',
					beforeSend: function () {
						Swal.showLoading();
						$('#add_document').find('button').attr('disabled', true);

					},
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
						'Authorization': '<?php echo config('app.key') ?>'
				      },
					success: function (data) {
						Swal.close();
						$('#add_document')[0].reset();
						$('#add_document').find('button').attr('disabled', false);
						if (data.response) {
							Swal.fire({
								title: data.message,
								text: "",
								icon: "success",
								showCancelButton: true,
								confirmButtonColor: "#3085d6",
								cancelButtonColor: "#d33",
								confirmButtonText: "View Profile"
							}).then((result) => {
								if (result.isConfirmed) {
									window.location.href = base_url + '/watchlisted/user/view_profile?id=' + data.id;

								} s

							});
							// setTimeout(reload_page, 3000);


						} else {

							alert(data.message)

						}
					},
					error: function () {
						alert('something Wrong')
					}

				});
			}
		});


	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('watchlisted.users.layout.user_watchlisted_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/watchlisted/users/contents/add/add.blade.php ENDPATH**/ ?>