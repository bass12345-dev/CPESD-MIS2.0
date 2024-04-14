
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('watchlisted.admin.contents.list.sections.list_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<?php echo $__env->make('dts.includes.datatable_with_select', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>




$('button#remove').on('click', function(){
    var button_text = 'Submit';
    text = 'Selected individuals will be stored in restore section';
    let items = get_select_items_datatable();

    var url = '/wl/ch-stat';
    var data = {
                id : items,
                status : 'inactive'
    };
    delete_item(data,url,button_text,text);
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('watchlisted.admin.layout.watchlisted_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/watchlisted/admin/contents/list/list.blade.php ENDPATH**/ ?>