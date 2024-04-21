
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

document.addEventListener("DOMContentLoaded", function () {
   table = $("#datatable_with_select").DataTable({
      responsive: true,
      ordering: false,
      processing: true,
      pageLength: 25,
      language: {
         "processing": '<div class="d-flex justify-content-center "> <img class="top-logo mt-4" src="<?php echo e(asset("assets/img/peso_logo.png")); ?>"></div>'
      },
      dom: 'Bfrtip',
      buttons: ['copy', 'print', 'csv'],
      ajax: {
         url: base_url + "/wl/user/g-p-l",
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
      }],
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
                  return '<a href="'+base_url+'/watchlisted/user/view_profile?id='+row.person_id+'" >'+row.name+'</a>';
               }
            },

           

   ]
   });
});

$(document).on('click', 'button#delete', function(){

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
<?php echo $__env->make('watchlisted.users.layout.user_watchlisted_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS2.0\resources\views/watchlisted/users/contents/pending_list/pending.blade.php ENDPATH**/ ?>