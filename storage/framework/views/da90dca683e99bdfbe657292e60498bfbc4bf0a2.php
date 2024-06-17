<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="">
            <span class="align-middle">PESO DTS Administrator</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>
            <?php $segments = Request::segments();?>


            <li class="sidebar-item">
                <a data-bs-target="#multi-2" data-bs-toggle="collapse" class="sidebar-link collapsed "> <i class="align-middle" data-feather="sliders"></i> Dashboard & Analytics</a>
                <ul id="multi-2" class="sidebar-dropdown list-unstyled collapse <?= $segments[2] == 'dashboard' || 'analytics' ? 'show' : '' ?>">
                    <li class="sidebar-item <?= $segments[2] == 'dashboard' ? 'active' : '' ?>">
                        <a class="sidebar-link" href="<?php echo e(url('/dts/admin/dashboard')); ?>">
                             <span class="align-middle">Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item <?= $segments[2] == 'analytics' ? 'active' : '' ?>">
                        <a class="sidebar-link" href="<?php echo e(url('/dts/admin/analytics')); ?>">
                             <span class="align-middle">Analytics</span>
                        </a>
                    </li>
                </ul>
            </li>



            <li class="sidebar-item <?= $segments[2] == 'all-documents' ? 'active' : '' ?>">
                <a class="sidebar-link" href="<?php echo e(url('/dts/admin/all-documents')); ?>">
                    <i class=" fas fa-file align-middle"></i> <span class="align-middle">All Documents</span>
                </a>
            </li>

            <li class="sidebar-item <?= $segments[2] == 'offices' ? 'active' : '' ?>">
                <a class="sidebar-link" href="<?php echo e(url('/dts/admin/offices')); ?>">
                    <i class="fas fa-building align-middle"></i> <span class="align-middle">Manage Offices</span>
                </a>
            </li>

            <li class="sidebar-item <?= $segments[2] == 'doc-types' ? 'active' : '' ?>">
                <a class="sidebar-link" href="<?php echo e(url('/dts/admin/doc-types')); ?>">
                    <i class="align-middle" data-feather="plus"></i> <span class="align-middle">Document Types</span>
                </a>
            </li>

            <li class="sidebar-item <?= $segments[2] == 'final-actions' ? 'active' : '' ?>">
                <a class="sidebar-link" href="<?php echo e(url('/dts/admin/final-actions')); ?>">
                    <i class="align-middle" data-feather="plus"></i> <span class="align-middle">Final Actions</span>
                </a>
            </li>


            <?php 
                use App\Models\CustomModel;

$row = CustomModel::q_get_where('users', array('user_id' => session('_id')))->first();
if ($row->user_id == 8) {
                ?>

            <li class="sidebar-item <?= $segments[2] == 'manage-staff' ? 'active' : '' ?>">
                <a class="sidebar-link" href="<?php echo e(url('/dts/admin/manage-staff')); ?>">
                    <i class="align-middle fas fa-hand"></i> <span class="align-middle">Manage Staff</span>
                </a>
            </li>

            <?php }  ?>

            <li class="sidebar-item <?= $segments[2] == 'manage-users' ? 'active' : '' ?>">
                <a class="sidebar-link" href="<?php echo e(url('/dts/admin/manage-users')); ?>">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Manage Users</span>
                </a>
            </li>



            <li class="sidebar-item <?= $segments[2] == 'logged-in-history' ? 'active' : '' ?>">
                <a class="sidebar-link" href="<?php echo e(url('/dts/admin/logged-in-history')); ?>">
                    <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Logged in
                        History</span>
                </a>
            </li>

            <li class="sidebar-item <?= $segments[2] == 'action-logs' ? 'active' : '' ?>">
                <a class="sidebar-link" href="<?php echo e(url('/dts/admin/action-logs')); ?>">
                    <i class="align-middle" data-feather="activity"></i> <span class="align-middle">Action Logs</span>
                </a>
            </li>

            <li class="sidebar-item <?= $segments[2] == 'track' ? 'active' : '' ?>">
                <a class="sidebar-link" href="<?php echo e(url('/dts/admin/track')); ?>">
                    <i class="align-middle" data-feather="search"></i> <span class="align-middle">Search
                        Documents</span>
                </a>
            </li>





            <!-- <li class="sidebar-item <?= $segments[2] == 'back-up' ? 'active' : '' ?>">
                <a class="sidebar-link" href="<?php echo e(url('/dts/admin/back-up')); ?>">
                    <i class="align-middle" data-feather="database"></i> <span class="align-middle">Back Up
                        Database</span>
                </a>
            </li> -->


        </ul>


    </div>
</nav><?php /**PATH C:\Apache24\htdocs\CPESD-MIS2.0\resources\views/dts/admin/layout/admin_includes/admin_sidebar.blade.php ENDPATH**/ ?>