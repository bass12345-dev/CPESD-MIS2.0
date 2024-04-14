
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('watchlisted.admin.contents.to_approve.sections.to_approve_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<?php echo $__env->make('dts.includes.datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('dts.includes.datatable_with_select', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>

$('button#delete').on('click', function() {

var button_text = 'Delete selected items';
var url = '/wl/delete';
let items = get_select_items_datatable();

var data = {
   id: items
};
if (items.length == 0) {
   alert('Please Select at least one')
} else {
   delete_item(data, url, button_text);
}
});

$('button#approve').on('click', function() {

var button_text = 'Approve selected items';
var url = '/wl/app-p';
let items = get_select_items_datatable();

var data = {
   id: items
};
if (items.length == 0) {
   alert('Please Select at least one')
} else {
   delete_item(data, url, button_text);
}
});


</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('watchlisted.admin.layout.watchlisted_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/watchlisted/admin/contents/to_approve/to_approve.blade.php ENDPATH**/ ?>