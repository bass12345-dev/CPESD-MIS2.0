
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="card flex-fill p-3">
        <div class="card-header">
           <?php echo $__env->make('components.filter1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         </div>
         <table class="table table-hover  " id="datatables-buttons" style="width: 100%; "  >
            <thead>
               <tr>
                  <th >#</th>
                  <th >Name</th>
                  <th >Date And Time</th>
               </tr>
            </thead>

         </table>
</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
   var month = $('input[name=month]').val();
   jSuites.calendar(document.getElementById('calendar'), {
      type: 'year-month-picker',
      format: 'MMMM-YYYY',
   });

    
   $(document).on('click','#by-month', function(){
      month = $('input[name=month]').val();
      show_logs(month);
   });

   $(document).on('click','#all_data', function(){
      show_logs(month=null);
   });
   

   var show_logs = function (month) {
      var add_to_url='';
      if(month!=null){
         add_to_url = '?m='+month
      }
      loader();
      $.ajax({
         type: "GET",
         url: base_url + "/dts/login-history"+add_to_url,
         headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                  },
         datatype: "json",
         traditional: true
      }).done(function (data) {
         JsLoadingOverlay.hide();
            table = $("#datatables-buttons").DataTable({
               responsive: true,
               ordering: false,
               processing: true,
               pageLength: 25,
               destroy: true,
               language: {
                  "processing": '<div class="d-flex justify-content-center "> <img class="top-logo mt-4" src="<?php echo e(asset("assets/img/peso_logo.png")); ?>"></div>'
               },
               "dom": "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
               buttons: [
                  {
                     extend: 'copy',
                     text: 'Copy',
                     className: 'btn btn-warning rounded-pill ',
                     footer: true,

                  },
                  {
                     extend: 'print',
                     text: 'Print',
                     className: 'btn btn-info rounded-pill  ms-2',
                     footer: true,

                  }, {
                     extend: 'csv',
                     text: 'CSV',
                     className: 'btn btn-success rounded-pill ms-2',
                     footer: true,

                  },],
               data: data,
             
               columns: [
                  {
                     data: 'number',
                  },
                  {
                     data: 'name',
                  },
                  {
                     data: 'datetime'
                  },

               ],
            });


         });
   };

$(document).ready(function(){
   show_logs(month);
});
</script>
<!-- <?php echo $__env->make('dts.includes.datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dts.admin.layout.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS2.0\resources\views/dts/admin/contents/logged_in_history/logged_in_history.blade.php ENDPATH**/ ?>