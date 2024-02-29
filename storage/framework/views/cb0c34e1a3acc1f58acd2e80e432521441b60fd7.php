<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>
       
				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<?php echo $__env->make('watchlisted.includes.logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					</ul>
				</div>
			</nav><?php /**PATH C:\xampp\htdocs\CPESD-MIS2.0\resources\views/watchlisted/admin/layout/watchlisted_includes/watchlisted_topbar.blade.php ENDPATH**/ ?>