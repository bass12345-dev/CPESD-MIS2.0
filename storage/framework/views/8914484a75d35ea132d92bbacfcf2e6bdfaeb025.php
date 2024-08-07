
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<div class="row">
   <div class="col-12  col-md-7 ">
      <?php echo $__env->make('dts.admin.contents.doc_types.sections.doc_types_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   </div>
   <div class="col-12 col-md-5">
      <?php echo $__env->make('dts.admin.contents.doc_types.sections.add_doc_types', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php echo $__env->make('dts.includes.datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
   $('a#remove').on('click', function () {
      var id = $(this).data('id');
      var url = '/dts/delete-type';
      delete_item(id, url);
      setTimeout(function() { 
            reload_page();
      }, 2000);
   });

   $('a#update').on('click', function () {
      var id = $(this).data('id');
      var item_name = $(this).data('name');
      $('input[name=id]').val(id);
      $('input[name=type]').val(item_name);
      $('#add_form').find('button.submit').text('Update');
      $('#add_form').find('button.cancel_update').attr('hidden', false);
      $('.card-title').text('Update ' + item_name + ' Type');
   });

   $('#add_form').find('button.cancel_update').on('click', function () {
      $(this).attr('hidden', true);
      $('input[name=id]').val('');
      $('input[name=type]').val('');
      $('#add_form').find('button.submit').text('Submit');
      $('.card-title').text('Add Document Type');
   });

   $('#add_form').on('submit', function (e) {
      e.preventDefault();
      var form = $(this).serialize();
      var id = $('input[name=id]').val();
      $('#add_form').find('button').attr('disabled', true);
      if (!id) {
         var url = '/dts/add-document-type';
         add_item(form, url);
      } else {
         var url = '/dts/update-type';
         update_item(id, form, url);

      }
      setTimeout(function() { 
            reload_page();
      }, 2000);
   });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dts.admin.layout.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS2.0\resources\views/dts/admin/contents/doc_types/doc_types.blade.php ENDPATH**/ ?>