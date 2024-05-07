<div class="card">
    <div class="card-header bg-primary text-white">
        Added Today - <?php echo e($today); ?>

    </div>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Status</th>

            </tr>
        </thead>

        <tbody>
            <?php $i = 1;
            foreach ($count['added_today'] as $row) {

                $status  = '';
                $bg      = '';

                switch ($row->status) {
                    case 'not-approved':
                        $status = 'To Approved';
                        $bg = 'bg-warning';
                        break;
                    case 'inactive':
                        $status = 'Removed';
                        $bg = 'bg-success';
                        break;
                    case 'active':
                        $status = 'Approved';
                        $bg = 'bg-danger';
                }


            ?>
                <tr>
                    <th><?php echo e($i++); ?></th>
                    <td> <a href="<?php echo e(url('')); ?>/watchlisted/admin/view_profile?id=<?php echo e($row->person_id); ?>"> <?php echo e($row->first_name); ?> <?php echo e($row->middle_name); ?> <?php echo e($row->last_name); ?> <?php echo e($row->extension); ?> </a> </td>
                    <td><span class="badge <?php echo e($bg); ?>"><?php echo e($status); ?></span></td>

                </tr>
            <?php } ?>
        </tbody>

    </table>
</div><?php /**PATH C:\xampp\htdocs\CPESD-MIS2.0\resources\views/watchlisted/admin/contents/dashboard/sections/tabs/added_today.blade.php ENDPATH**/ ?>