
<!-- <?php $__env->startSection('title', 'Dashboard'); ?> -->
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('dts.receiver.contents.incoming.sections.incoming_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>





<?php $__env->stopSection(); ?>



<?php $__env->startSection('js'); ?>

<script type="text/javascript">



$('a.received_document').on('click', function(){

   var id = $(this).data('id');
   Swal.fire({
     title: "Are you sure?",
     text: "",
     icon: "warning",
     showCancelButton: true,
     confirmButtonColor: "#3085d6",
     cancelButtonColor: "#d33",
     confirmButtonText: "Received Document"
   }).then((result) => {
     if (result.isConfirmed) {
       received_document(id);
     }
   });
});

function received_document(id){
      let data = {id:id};
      var url = '/dts/us/receive-document';
      update_item(id='',data,url);
}

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dts.receiver.layout.receiver_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS2.0\resources\views/dts/receiver/contents/incoming/incoming.blade.php ENDPATH**/ ?>