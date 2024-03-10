
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('watchlisted.admin.contents.restore.sections.restore_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>

$('input[name=check_all]').on('change', function(){

var check = $('input[name=check_all]:checked').val();
if(check == 'true'){
   $('input[name=person_id]').prop('checked', true);
}else {
   $('input[name=person_id]').prop('checked', false);
} 
});

$('button#delete').on('click', function(){
    let items = [];
    $('input[name=person_id]:checked').map(function(item){

        items.push($(this).val());
    });

    var url = '/wl/delete';
    var data = {
                id : items,
  
    };
   delete_item(data,url);
    
});


$('button#restore').on('click', function(){
    let items = [];
    var button_text = 'Restore selected items';
    $('input[name=person_id]:checked').map(function(item){

        items.push($(this).val());
    });

    var url = '/wl/ch-stat';
    var data = {
                id : items,
                status : 'active'
  
    };
   delete_item(data,url,button_text);
    
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('watchlisted.admin.layout.watchlisted_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/watchlisted/admin/contents/restore/restore.blade.php ENDPATH**/ ?>