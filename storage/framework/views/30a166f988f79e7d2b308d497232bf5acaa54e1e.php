
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
   <div class="col-12  col-md-7 ">
      <?php echo $__env->make('dts.users.contents.add_document.sections.document_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   </div>
   <div class="col-12 col-md-5">
      <?php echo $__env->make('dts.users.contents.add_document.sections.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script type="text/javascript">
   $('#add_document').on('submit', function(e) {
      e.preventDefault();
      var url = '/dts/us/add-d';
      var form = $(this).serialize();


      Swal.fire({
         title: "Review First Before Submitting",
         text: "",
         icon: "warning",
         showCancelButton: true,
         confirmButtonColor: "#3085d6",
         cancelButtonColor: "#d33",
         confirmButtonText: "Submit"
      }).then((result) => {
         if (result.isConfirmed) {
            //add_item(form,url);
            $('#add_document').find('button').attr('disabled', true);
            add_document(form, url);


         }
      });


   });

   function add_document(form,url) {
      Swal.showLoading();
      $.ajax({
         url: base_url + url,
         method: 'POST',
         data: form,
         dataType: 'json',
 
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
         },
         success: function(data) {
            Swal.close();
            var id = data.id;
            if (data.response) {


               Swal.fire({
                  title: "Print Routing Slip",
                  text: "",
                  icon: "success",
                  showCancelButton: true,
                  confirmButtonColor: "#3085d6",
                  cancelButtonColor: "#d33",
                  confirmButtonText: "print"
               }).then((result) => {
                  if (result.isConfirmed) {
         
                     window.location.href = base_url + '/dts/user/print-slip?id=' + id
                  }

               });

            } else {

               alert(data.message)

            }

            // setTimeout(reload_page, 2000)
         },
         error: function() {
            alert('something Wrong');
            // location.reload();
         }

      });
   }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dts.users.layout.user_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/users/contents/add_document/add_document.blade.php ENDPATH**/ ?>