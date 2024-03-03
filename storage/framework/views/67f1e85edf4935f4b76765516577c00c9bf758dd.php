<nav id="sidebar" class="sidebar js-sidebar">
	<div class="sidebar-content js-simplebar">
		<a class="sidebar-brand" href="">
			<span class="align-middle">PESO DTS RECEIVER</span>
		</a>

		<ul class="sidebar-nav">

			<?php $segments = Request::segments(); ?>

			<li class="sidebar-header">
				Pages
			</li>

			<li class="sidebar-item <?= $segments[2] == 'dashboard' ? 'active' : '' ?>">
				<a class="sidebar-link" href="<?php echo e(url('/dts/receiver/dashboard')); ?>">
					<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
				</a>
			</li>

			<!-- 		<li class="sidebar-item">
						<a class="sidebar-link" href="<?php echo e(url('/dts/receiver/pending')); ?>">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Pending</span>
            </a>
					</li> -->

			<li class="sidebar-item <?= $segments[2] == 'all-documents' ? 'active' : '' ?>">
				<a class="sidebar-link" href="<?php echo e(url('/dts/receiver/all-documents')); ?>">
					<i class="align-middle" data-feather="file"></i> <span class="align-middle">All Documents</span>
				</a>
			</li>

			<li class="sidebar-item <?= $segments[2] == 'incoming' ? 'active' : '' ?>">
				<a class="sidebar-link" href="<?php echo e(url('/dts/receiver/incoming')); ?>">
					<i class="align-middle" data-feather="arrow-left"></i> <span class="align-middle">Incoming</span>
				</a>
			</li>

			<li class="sidebar-item <?= $segments[2] == 'received' ? 'active' : '' ?>">
				<a class="sidebar-link" href="<?php echo e(url('/dts/receiver/received')); ?>">
					<i class="align-middle" data-feather="arrow-down"></i> <span class="align-middle">Received</span>
				</a>
			</li>



		</ul>


	</div>
</nav><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/receiver/layout/receiver_includes/receiver_sidebar.blade.php ENDPATH**/ ?>