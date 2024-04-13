
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
   <div class="col-md-12 col-12   ">
      <?php echo $__env->make('dts.users.contents.received.sections.received_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   </div>
</div>
<?php echo $__env->make('dts.users.contents.received.sections.forward_offcanvas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('dts.users.contents.received.sections.forward_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php echo $__env->make('dts.includes.datatable_with_select', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>

//MULTIPLE ACTIONS
$('button#multiple_forward').on('click', function(){
   
   
   let array = get_select_items_datatable();
   let html = '';

   if(array.length > 0){
      $('#forward_modal').modal('show');
      $('input[name=history_track1]').val(array);
      array.forEach(element => {
         const myArray = element.split("-");
         const first = myArray[0];
         const second = myArray[1];
         html += '<li class="text-danger h3">'+second+'</li>';
      });
      $('.display_tracking_number').html(html);
   }else {
      alert('Please Select at least one')
   }

  
});


$('#forward_form2').on('submit', function (e) {
   e.preventDefault();
   var url = '/dts/us/forward-documents';
   var form = $(this).serialize();

   Swal.fire({
     title: "Are you sure?",
     text: "",
     icon: "warning",
     showCancelButton: true,
     confirmButtonColor: "#3085d6",
     cancelButtonColor: "#d33",
     confirmButtonText: "Foward Document"
   }).then((result) => {
     if (result.isConfirmed) {
      add_item(form,url);
      $('#forward_form2').find('button').attr('disabled',true);
     }
   });
 
});



$('button#received_error').on('click', function(){
   
   selected_items = get_select_items_datatable();


      if(selected_items.length  == 0){
         alert('Please Select at least one')
      }else{
         var url = '/dts/us/r-es';
         let form = {
               items : selected_items
         }
         delete_item(form, url, button_text = 'Submit', text = 'The documents that you\'ve selected will be back to incoming section')
      
      }
});





//INDIVIDUAL ACTIONS
$('a#forward_icon').on('click', function(){
   $('input[name=history_id]').val($(this).data('history-id'));
   $('input[name=tracking_number]').val($(this).data('tracking-number'));
   $('.offcanvas-title').text('Forward Document #' +$(this).data('tracking-number') );

});

$('#forward_form').on('submit', function (e) {
   e.preventDefault();
   var url = '/dts/us/forward-document';
   var form = $(this).serialize();

   Swal.fire({
     title: "Are you sure?",
     text: "",
     icon: "warning",
     showCancelButton: true,
     confirmButtonColor: "#3085d6",
     cancelButtonColor: "#d33",
     confirmButtonText: "Foward Document"
   }).then((result) => {
     if (result.isConfirmed) {
      add_item(form,url);
      $('#forward_form').find('button').attr('disabled',true);
     }
   });
 
});


$('a#received_error').on('click', function(){

   var url = '/dts/us/r-e';
   var history_id = $(this).data('history-id');
   var tracking_number = $(this).data('tracking-number');

   let form = {
      history_id : history_id,
      tracking_number : tracking_number
   }


   Swal.fire({
     title: "Received Error?",
     text: "This document will be back to incoming section | DOCUMENT NO. "+tracking_number,
     icon: "warning",
     showCancelButton: true,
     confirmButtonColor: "#3085d6",
     cancelButtonColor: "#d33",
     confirmButtonText: "Submit"
   }).then((result) => {
     if (result.isConfirmed) {
      add_item(form,url);
     
     }
   });
  

});

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dts.users.layout.user_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/users/contents/received/received.blade.php ENDPATH**/ ?>