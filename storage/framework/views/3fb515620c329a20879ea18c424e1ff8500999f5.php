<li class="nav-item dropdown">
    <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
        <i class="align-middle" data-feather="settings"></i>
    </a>

    <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
        <span class="text-dark"><?php echo e(session('name')); ?></span>
    </a>
    <div class="dropdown-menu dropdown-menu-end">
        <a class="dropdown-item text-danger" href="<?php echo e(url('/wl_logout')); ?>">Log out</a>
    </div>
</li><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/watchlisted/includes/logout.blade.php ENDPATH**/ ?>