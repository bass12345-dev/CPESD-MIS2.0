<div class="card">
    <div class="card-header bg-primary text-white">
        Approved Today - <?php echo e($today); ?>

    </div>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>   
            </tr>
        </thead>

        <tbody>
            <?php $i = 1;
            foreach ($count['approved_today'] as $row) {
            ?>
                <tr>
                    <th><?php echo e($i++); ?></th>
                    <td> <a href="<?php echo e(url('')); ?>/watchlisted/admin/view_profile?id=<?php echo e($row->person_id); ?>"> <?php echo e($row->first_name); ?> <?php echo e($row->middle_name); ?> <?php echo e($row->last_name); ?> <?php echo e($row->extension); ?> </a> </td>
                </tr>
            <?php } ?>
        </tbody>

    </table>
</div><?php /**PATH C:\xampp\htdocs\CPESD-MIS2.0\resources\views/watchlisted/admin/contents/dashboard/sections/tabs/approved_today.blade.php ENDPATH**/ ?>