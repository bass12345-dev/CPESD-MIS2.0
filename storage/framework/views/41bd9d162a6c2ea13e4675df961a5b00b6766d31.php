
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('watchlisted.admin.contents.to_approve.sections.to_approve_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<?php echo $__env->make('dts.includes.datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('dts.includes.datatable_with_select', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>


document.addEventListener("DOMContentLoaded", function () {
   table = $("#datatable_with_select").DataTable({
      responsive: true,
      ordering: false,
      processing: true,
      pageLength: 25,
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
              
            }, ],
      ajax: {
         url: base_url + "/wl/t-a-w",
         method: 'GET',
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
         },
         dataSrc: ""
      },
      columns: [
         {
         data: 'person_id'
      },
      {
         data: 'number'
      }, {
         data: null
      }, {
         data: 'age'
      }, {
         data: 'address'
      }, {
         data: 'email'
      }, {
         data: 'phone_number'
      },{
         data: 'encoded_by'
      }
   ],
      'select': {
         'style': 'multi',
      },
      columnDefs: [ 
         {
         'targets': 0,
         'checkboxes': {
            'selectRow': true
         },
      },
            {
               targets: 2,
               data: null,
               render: function (data, type, row) {
                  return '<a href="'+base_url+'/watchlisted/admin/view_profile?id='+row.person_id+'" >'+row.name+'</a>';
               }
            },

           

   ]
   });
});


$('button#delete').on('click', function() {

var button_text = 'Delete selected items';
var url = '/wl/delete';
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

$('button#approve').on('click', function() {

var button_text = 'Approve selected items';
var url = '/wl/app-p';
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

<?php echo $__env->make('watchlisted.admin.layout.watchlisted_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS2.0\resources\views/watchlisted/admin/contents/to_approve/to_approve.blade.php ENDPATH**/ ?>