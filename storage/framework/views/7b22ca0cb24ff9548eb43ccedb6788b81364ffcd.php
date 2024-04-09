
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
   <div class="col-md-12 col-12   ">
      <?php echo $__env->make('dts.users.contents.incoming.sections.incoming_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<script>



$('a.received_document').on('click', function(){

   var id = $(this).data('id');
   var t = $(this).data('track');
   Swal.fire({
     title: "Are you sure?",
     text: 'Click "RECEIVE BUTTON" if the document is on your table | DOCUMENT NO. #'+t,
     icon: "warning",
     showCancelButton: true,
     confirmButtonColor: "#3085d6",
     cancelButtonColor: "#d33",
     confirmButtonText: "Received Document"
   }).then((result) => {
     if (result.isConfirmed) {
      
       received_document(id,t);
     }
   });
});

function received_document(id,t){
      let form = {
                  id : id,
                  tracking_number : t
                  }
      var url = '/dts/us/receive-document';
   
      add_item(form,url);
}


$('a#received_documents').on('click', function(){

selected_items = get_selected_items();


if(selected_items.length  == 0){
   alert('Please Select at least one')
}else{
   
}



});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dts.users.layout.user_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/users/contents/incoming/incoming.blade.php ENDPATH**/ ?>