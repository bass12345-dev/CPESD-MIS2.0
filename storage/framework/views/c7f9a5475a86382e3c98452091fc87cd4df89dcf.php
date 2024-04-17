
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
   <div class="col-md-12 col-12   ">
   <?php echo $__env->make('dts.users.contents.outgoing.sections.outgoing_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php echo $__env->make('dts.includes.datatable_with_select', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
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
         url: base_url + "/dts/us/g-o-d",
         method: 'GET',
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
         },
         dataSrc: ""
      },
      columns: [
         {
         data: 'doc_id',
      }, 
         {
         data: 'number',
      }, 
      {
         data: 'tracking_number',
      }, 
      {
         data: null,
      }, 
      {
         data: 'name',
      }, 
      {
         data: 'type_name',
      }, 
      {
         data: 'remarks',
      }, 
      {
         data: 'outgoing_date',
      }, 
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
               targets: 3,
               data: null,
               render: function (data, type, row) {
                  return '<a href="' + base_url + '/dts/user/view?tn=' + row.tracking_number + '" data-toggle="tooltip" data-placement="top" title="View ' + row.tracking_number + ' ?>">' + row.document_name + '</a>';
               }
            },
   ]

   });
});


$('a#received_documents').on('click', function () {
   selected_items = get_select_items_datatable();
   if (selected_items.length == 0) {
      alert('Please Select at least one');
   } else {
      var url = '/dts/us/r-f-o';
      let form = {
         items: selected_items
      };
      delete_item(form, url, button_text = 'Receive Document', text = '')
   }
}); 
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dts.users.layout.user_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/users/contents/outgoing/outgoing.blade.php ENDPATH**/ ?>