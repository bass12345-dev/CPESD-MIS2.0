<!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $__env->make('global_includes.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('watchlisted.includes.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
	<div class="wrapper">
		<?php echo $__env->make('watchlisted.users.layout.user_watchlisted_includes.user_watchlisted_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<div class="main">
        <?php echo $__env->make('watchlisted.users.layout.user_watchlisted_includes.user_watchlisted_topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
<?php echo $__env->make('global_includes.js_.wl_script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</html><?php /**PATH C:\xampp\htdocs\CPESD-MIS2.0\resources\views/watchlisted/users/layout/user_watchlisted_master.blade.php ENDPATH**/ ?>