
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('dts.admin.contents.all_documents.sections.all_documents_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
    $('button#delete').on('click', function(){
    let items = [];
    var button_text = 'Remove selected items';
    $('input[name=document_id]:checked').map(function(item){

        items.push($(this).val());
    });

    var url = '/dts/delete-documents';
    var data = {
                id : items,
              
    };
    delete_item(data,url,button_text);
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dts.admin.layout.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS2.0\resources\views/dts/admin/contents/all_documents/all_documents.blade.php ENDPATH**/ ?>