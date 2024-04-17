
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
<?php echo $__env->make('dts.users.contents.my_documents.modals.print_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script type="text/javascript">

document.addEventListener("DOMContentLoaded", function () {
   table = $("#datatables-buttons").DataTable({
      responsive: true,
      ordering: false,
      processing: true,
      pageLength: 25,
      language: {
         "processing": '<div class="d-flex justify-content-center "> <img class="top-logo mt-4" src="<?php echo e(asset("assets/img/peso_logo.png")); ?>"></div>'
      },
      
      
      ajax: {
         url: base_url + "/dts/us/g-l-d",
         method: 'GET',
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
         },
         dataSrc: ""
      },
      columns: [
         {
         data: 'number',
      }, 
      {
         data: null,
      }, 
      {
         data: 'name',
      }, 
      {
         data: 'document_number',
      }, 
   ],
      columnDefs: [ 
            {
               targets: 1,
               data: null,
               render: function (data, type, row) {
                  return '<a href="' + base_url + '/dts/user/view?tn=' + row.document_number + '" data-toggle="tooltip" data-placement="top" title="View ' + row.document_number + ' ?>">' + row.document_name + '</a>';
               }
            },

           

   ]

   });
});


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
            add_item(form, url);
            $('#add_document').find('button').attr('disabled', false);
            $('#add_document')[0].reset();
            tracking_number();

         }
      });


   });


   function tracking_number(){
      var url = '/dts/us/g-t-n';
      $.ajax({
        url: base_url + url,
        method: 'GET',
        dataType: 'text',
        beforeSend : function(){
            loader();
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        success: function(data) {
            JsLoadingOverlay.hide();
            if (data) {
                $('input[name=tracking_number]').val(data);
            } else {
               alert('Failed to load Tracking Number Please Contact the Develope');
                setTimeout(reload_page, 2000)
            } 
        },
        error: function() {
            alert('Failed to load Tracking Number Please Contact the Developer');
            location.reload();
            JsLoadingOverlay.hide();
        }

    });
      
   }

   $(document).ready(function(){
      tracking_number();
   })


</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dts.users.layout.user_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/users/contents/add_document/add_document.blade.php ENDPATH**/ ?>