<nav id="sidebar" class="sidebar js-sidebar">
	<div class="sidebar-content js-simplebar">
		<a class="sidebar-brand" href="">
			<span class="align-middle">PESO Watchlisted Administrator</span>
		</a>

		<?php $segments = Request::segments(); ?>

		<ul class="sidebar-nav">
			<li class="sidebar-header">
				Pages
			</li>

			<li class="sidebar-item <?= $segments[2] == 'dashboard' ? 'active' : '' ?>">
				<a class="sidebar-link" href="<?php echo e(url('/watchlisted/admin/dashboard')); ?>">
					<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
				</a>
			</li>

			<li class="sidebar-item <?= $segments[2] == 'to-approve' ? 'active' : '' ?>">
				<a class="sidebar-link" href="<?php echo e(url('/watchlisted/admin/to-approve')); ?>">
					<i class=" fas fa-file align-middle"></i> <span class="align-middle">To Approve</span>
				</a>
			</li>

			<li class="sidebar-item <?= $segments[2] == 'list' ? 'active' : '' ?>">
				<a class="sidebar-link" href="<?php echo e(url('/watchlisted/admin/list')); ?>">
					<i class=" fas fa-file align-middle"></i> <span class="align-middle">Approved</span>
				</a>
			</li>

			<li class="sidebar-item <?= $segments[2] == 'restore' ? 'active' : '' ?>">
				<a class="sidebar-link" href="<?php echo e(url('/watchlisted/admin/restore')); ?>">
					<i class="fa fa-refresh align-middle"></i> <span class="align-middle">Restore</span>
				</a>
			</li>

			<li class="sidebar-item <?= $segments[2] == 'add' ? 'active' : '' ?>">
				<a class="sidebar-link" href="<?php echo e(url('/watchlisted/admin/add')); ?>">
					<i class="align-middle" data-feather="plus"></i> <span class="align-middle">Add</span>
				</a>
			</li>

			<li class="sidebar-item <?= $segments[2] == 'search' ? 'active' : '' ?>">
				<a class="sidebar-link" href="<?php echo e(url('/watchlisted/admin/search')); ?>">
					<i class="align-middle" data-feather="search"></i> <span class="align-middle">Search</span>
				</a>
			</li>

			<li class="sidebar-item <?= $segments[2] == 'manage-program' ? 'active' : '' ?>">
				<a class="sidebar-link" href="<?php echo e(url('/watchlisted/admin/manage-program')); ?>">
					<i class="align-middle" data-feather="edit"></i> <span class="align-middle">Manage Program</span>
				</a>
			</li>

			<li class="sidebar-item <?= $segments[2] == 'activity-logs' ? 'active' : '' ?>">
				<a class="sidebar-link" href="<?php echo e(url('/watchlisted/admin/activity-logs')); ?>">
					<i class="align-middle" data-feather="list"></i> <span class="align-middle">Activity Logs</span>
				</a>
			</li>

			<!-- <li class="sidebar-item <?= $segments[2] == 'change-code' ? 'active' : '' ?>">
				<a class="sidebar-link" href="<?php echo e(url('/watchlisted/admin/change-code')); ?>">
					<i class="align-middle" data-feather="key"></i> <span class="align-middle">Change Security Code</span>
				</a>
			</li> -->


		</ul>


	</div>
</nav><?php /**PATH C:\xampp\htdocs\CPESD-MIS2.0\resources\views/watchlisted/admin/layout/watchlisted_includes/watchlisted_sidebar.blade.php ENDPATH**/ ?>