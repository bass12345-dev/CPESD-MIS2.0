
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
   <div class="col-md-12">
    <?php echo $__env->make('dts.admin.contents.manage_users.sections.users_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<script>
$('li.set-inactive').on('click', function(){
var id = $(this).data('id');
let data = {id:id,status: 'inactive'}
var url = '/dts/c-u-s';
update_item(id,data,url);
});

$('li.set-active').on('click', function(){
var id = $(this).data('id');
let data = {id:id,status: 'active'}
var url = '/dts/c-u-s';
update_item(id,data,url);
});

$('li.delete').on('click', function(){
var id = $(this).data('id');
var url = '/dts/delete-user';
delete_item(id,url)
});

$('li.update-username').on('click', function(){
   var id = $(this).data('id');
   var url = '/dts/c-p-t-u';
   delete_item(id,url,button_text = 'Change',text = 'Change password same as username ? ')
});



</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dts.admin.layout.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/admin/contents/manage_users/manage_users.blade.php ENDPATH**/ ?>