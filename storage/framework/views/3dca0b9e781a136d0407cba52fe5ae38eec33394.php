
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
   <div class="col-md-12 col-12   ">
      <?php echo $__env->make('watchlisted.users.contents.pending_list.sections.pending_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php echo $__env->make('dts.includes.datatable_with_select', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>


   $('button#delete').on('click', function() {

      var button_text = 'Delete selected items';
      var url = '/wl/user/d-p';
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
<?php echo $__env->make('watchlisted.users.layout.user_watchlisted_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/watchlisted/users/contents/pending_list/pending.blade.php ENDPATH**/ ?>