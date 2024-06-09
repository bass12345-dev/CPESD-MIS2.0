
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="card flex-fill p-3">
   <div class="card-header d-flex">
      <button class="btn btn-primary " style="margin-right: 10px;">Show All Data</button>

      <input id='calendar' name="month" class="form-control w-25" />
      <button class="btn btn-success" id="by-month" style="margin-left:2px;">Submit</button>
   </div>
   <hr>
   <p class="text-danger ">*This month Actions</p>
   <table class="table table-hover  " id="datatables-buttons" style="width: 100%; ">
      <thead>
         <tr>
            <th>#</th>
            <th>Name</th>
            <th>Action</th>
            <th>Type</th>
            <th>Date And Time</th>

         </tr>
      </thead>

   </table>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="https://jsuites.net/v4/jsuites.js"></script>
<link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />
<script>

   var month = null;

   jSuites.calendar(document.getElementById('calendar'), {
      type: 'year-month-picker',
      format: 'MMM-YYYY',
   });
   
   $(document).on('click','#by-month', function(){
      month = $('input[name=month]').val();
      search(month);
   })
   
   var search = function (month) {
      var add_to_url = '';
      if(month!=undefined){
         add_to_url = '?m='+month
      }
      $.ajax({
         type: "GET",
         url: base_url + "/dts/action-logs"+add_to_url,
         headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                  },
         datatype: "json",
         traditional: true
      })
         .done(function (data) {

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
                     data: null,
                  },
                  {
                     data: null
                  },
                  {
                     data: 'action_datetime'
                  },

               ],
               columnDefs: [
                  {
                     targets: 2,
                     data: null,
                     render: function (data, type, row) {
                        return '<a href="' + base_url + '/dts/user/view?tn=' + row.tracking_number + '" data-toggle="tooltip" data-placement="top" title="View ' + row.tracking_number + ' ?>">' + row.action + '</a>';
                     }
                  },
                  {
                     targets: -2,
                     data: null,
                     render: function (data, type, row) {
                        return '<span class="badge bg-primary" style="font-size: 12px;">' + row.user_type + '</span>';
                     }
                  },



               ]

            });


         });
   };

   search();

   // document.addEventListener("DOMContentLoaded", function () {
   //    table = $("#datatables-buttons").DataTable({
   //       responsive: true,
   //       ordering: false,
   //       processing: true,
   //       pageLength: 25,
   //       language: {
   //          "processing": '<div class="d-flex justify-content-center "> <img class="top-logo mt-4" src="<?php echo e(asset("assets/img/peso_logo.png")); ?>"></div>'
   //       },
   //       "dom": "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
   //       buttons: [
   //             {
   //                extend: 'copy',
   //                text: 'Copy',
   //                className: 'btn btn-warning rounded-pill ',
   //                footer: true,

   //             }, 
   //             {
   //                extend: 'print',
   //                text: 'Print',
   //                className: 'btn btn-info rounded-pill  ms-2',
   //                footer: true,

   //             }, {
   //                extend: 'csv',
   //                text: 'CSV',
   //                className: 'btn btn-success rounded-pill ms-2',
   //                footer: true,

   //             }, ],
   //       ajax: {
   //          url: base_url + "/dts/action-logs",
   //          method: 'GET',
   //          headers: {
   //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
   //          },
   //          dataSrc: ""
   //       },
   //       columns: [
   //          {
   //          data: 'number',
   //       }, 
   //       {
   //          data: 'name',
   //       }, 
   //          {
   //          data: null,
   //       }, 
   //       {
   //          data: null
   //       }, 
   //       {
   //          data: 'action_datetime'
   //       }, 

   //           ],
   //           columnDefs: [ 
   //             {
   //                targets: 2,
   //                data: null,
   //                render: function (data, type, row) {
   //                   return '<a href="' + base_url + '/dts/user/view?tn=' + row.tracking_number + '" data-toggle="tooltip" data-placement="top" title="View ' + row.tracking_number + ' ?>">' + row.action + '</a>';
   //                }
   //             },
   //             {
   //                targets: -2,
   //                data: null,
   //                render: function (data, type, row) {
   //                   return '<span class="badge bg-primary" style="font-size: 12px;">'+row.user_type+'</span>';
   //                }
   //             },



   //    ]

   //    });
   // });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dts.admin.layout.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS2.0\resources\views/dts/admin/contents/action_logs/action_logs.blade.php ENDPATH**/ ?>