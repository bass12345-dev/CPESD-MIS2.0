<!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $__env->make('global_includes.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('dts.includes.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
	<div class="wrapper">
		<?php echo $__env->make('dts.users.layout.user_includes.user_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<div class="main">
			<?php echo $__env->make('dts.users.layout.user_includes.user_topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
<?php echo $__env->make('global_includes.js_.dts_script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


</html><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/users/layout/user_master.blade.php ENDPATH**/ ?>