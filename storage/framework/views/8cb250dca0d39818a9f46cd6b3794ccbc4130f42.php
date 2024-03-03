<!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $__env->make('global_includes.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('dts.includes.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
	<div class="wrapper">
		<?php echo $__env->make('dts.receiver.layout.receiver_includes.receiver_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<div class="main">
			<?php echo $__env->make('dts.receiver.layout.receiver_includes.receiver_topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<main class="content">
				<div class="container-fluid p-0">
					<?php echo $__env->yieldContent('content'); ?>
				</div>
			</main>
		</div>
	</div>
</body>
<?php echo $__env->make('global_includes.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('js'); ?>

</html><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/receiver/layout/receiver_master.blade.php ENDPATH**/ ?>