
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('watchlisted.admin.contents.restore.sections.restore_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<?php echo $__env->make('dts.includes.datatable_with_select', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>



$('button#delete').on('click', function(){
    let items = get_select_items_datatable();
    var url = '/wl/delete';
    var data = {
                id : items,
  
    };
   delete_item(data,url);
    
});


$('button#restore').on('click', function(){
    var button_text = 'Submit';
    text = 'Selected individuals will be back to active list';
    let items = get_select_items_datatable();
    var url = '/wl/ch-stat';
    var data = {
                id : items,
                status : 'active'
  
    };
   delete_item(data,url,button_text,text);
    
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('watchlisted.admin.layout.watchlisted_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/watchlisted/admin/contents/restore/restore.blade.php ENDPATH**/ ?>