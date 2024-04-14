
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
	<div class="col-md-7">
		<?php echo $__env->make('watchlisted.admin.contents.manage_program.sections.program_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</div>
	<div class="col-md-5">
		<?php echo $__env->make('watchlisted.admin.contents.manage_program.sections.add_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<?php echo $__env->make('dts.includes.datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
$('a#remove').on('click', function(){
   var id = $(this).data('id');
   var url = '/wl/delete-program';
   delete_item(id,url);
});



$('a#update').on('click', function(){
   var id = $(this).data('id');
   var item_name = $(this).data('name');
   var item_description = $(this).data('description');
   $('input[name=id]').val(id);
   $('input[name=program]').val(item_name);
   $('textarea[name=program_description]').val(item_description);
   $('#add_form').find('button.submit').text('Update');
   $('#add_form').find('button.cancel_update').attr('hidden', false);
   $('.card-title').text('Update '+item_name+ ' Program');
});

$('#add_form').find('button.cancel_update').on('click', function(){
   $(this).attr('hidden',true);
   $('input[name=id]').val('');
   $('input[name=program]').val('');
   $('textarea[name=program_description]').val('');
   $('#add_form').find('button.submit').text('Submit');
    $('.card-title').text('Register Programs');
});



$('#add_form').on('submit', function (e) {
   e.preventDefault();
   var form = $(this).serialize();
   var id = $('input[name=id]').val();

   if (!id) {
     var url = '/wl/add-program';
     add_item(form,url);
   }else {
      var url = '/wl/update-program';
      update_item(id,form,url);
      
   }

    $('#add_form').find('button').attr('disabled',true);

});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('watchlisted.admin.layout.watchlisted_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/watchlisted/admin/contents/manage_program/manage_program.blade.php ENDPATH**/ ?>