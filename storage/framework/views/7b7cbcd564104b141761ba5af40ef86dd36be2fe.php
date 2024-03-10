
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('watchlisted.admin.contents.change_code.sections.update_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>

	$('#update_form').on('submit', function (e) {
		e.preventDefault();

		var id = $(this).find('input[name=id]').val();
		var old = $(this).find('input[name=old]').val();
		var new_ = $(this).find('input[name=new]').val();
		var url = '/wl/change-code';
		let arr = {
			id : id,
			old: old,
			new: new_
		};

		add_item(arr, url);
		$(this)[0].reset();
	});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('watchlisted.admin.layout.watchlisted_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/watchlisted/admin/contents/change_code/change_code.blade.php ENDPATH**/ ?>