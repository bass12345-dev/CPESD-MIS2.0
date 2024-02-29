<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>
       
				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item ">
							<a href="<?php echo e(url('/dts/user/dashboard')); ?>" class="btn btn-primary">User Panel</a>
						</li>
					
						<?php echo $__env->make('dts.includes.logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					</ul>
				</div>
			</nav><?php /**PATH C:\xampp\htdocs\CPESD-MIS2.0\resources\views/dts/receiver/layout/receiver_includes/receiver_topbar.blade.php ENDPATH**/ ?>