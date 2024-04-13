<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

	<?php echo $__env->make('dts.includes.office_in_charge_display', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	
    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">

            <?php 
							if (session('user_type') == 'admin' || session('is_oic') == 'yes') {
								echo "<li class='nav-item '>
							<a href='".url("/dts/admin/dashboard")."' class='btn btn-danger'>Admin Panel</a>
						</li>";
							}


							 if(session('is_receiver') == 'yes') {

								echo '<li class="nav-item ">
							<a href="'.url("/dts/receiver/dashboard").'" class="btn btn-success">Final Receiver\'s Panel  <span class="badge bg-danger to_receive">0</span></a>
						</li>';
							}
						 ?>
            <?php echo $__env->make('dts.includes.logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </ul>
    </div>
</nav><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/users/layout/user_includes/user_topbar.blade.php ENDPATH**/ ?>