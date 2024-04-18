
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
   <div class="col-md-12 col-12   ">
   <?php echo $__env->make('dts.users.contents.outgoing.sections.outgoing_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   </div>
</div>
<?php echo $__env->make('dts.users.contents.outgoing.modals.update_outgoing_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
         data: 'office',
      }, 
      {
         data: 'type_name',
      }, 
      {
         data: null,
      }, 
      {
         data: 'outgoing_date',
      }, {
         data: null,
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
               targets: 6,
               data: null,
               render: function (data, type, row) {
                  return '<a href="javascript:;" data-remarks="'+row.remarks+'" id="view_remarks">View Remarks</a>';
               }
            },
      {
               targets: 3,
               data: null,
               render: function (data, type, row) {
                  return '<a href="' + base_url + '/dts/user/view?tn=' + row.tracking_number + '" data-toggle="tooltip" data-placement="top" title="View ' + row.tracking_number + ' ?>">' + row.document_name + '</a>';
               }
            },
            {
         targets: -1,
         data: null,
         orderable: false,
         className: 'text-center',
         render: function (data, type, row) {
               return '<div class="btn-group dropstart">\
                           <i class="fa fa-ellipsis-v " class="dropdown-toggle"  data-bs-toggle="dropdown" aria-expanded="false"></i>\
                              <ul class="dropdown-menu">\
                                 <li><a class="dropdown-item " data-remarks="'+row.remarks+'" data-outgoing-id="'+row.outgoing_id+'" data-office="'+row.office_id+'" id="update_outgoing">Update</a></li>\
                              </ul>\
                           </i>\
                        </div>\
               ';
             
           
             
         }
      }
           
   ]

   });
});

$(document).on('click', 'a#update_outgoing', function(){
      $('#update_outgoing_modal').modal('show');
      $('textarea[name=remarks]').val($(this).data('remarks'));
      $('select[name=office]').val($(this).data('office'));
      $('input[name=outgoing_id]').val($(this).data('outgoing-id'));
});

$('#update_outgoing_form').on('submit', function (e) {
   e.preventDefault();
   var url = '/dts/us/u-o-d';
   var form = $(this).serialize();
   Swal.fire({
      title: "Are you sure?",
      text: "",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Submit"
   }).then((result) => {
      if (result.isConfirmed) {
         $('#update_outgoing_form').find('button').attr('disabled', true);
         add_item(form, url);
         $('#update_outgoing_form').find('button').attr('disabled', false);
         $('#update_outgoing_form')[0].reset();
         $('#update_outgoing_modal').modal('hide');
      }
   });
});


$(document).on('click', 'a#received_documents', function(){
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