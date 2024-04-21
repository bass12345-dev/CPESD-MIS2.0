
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
<?php echo $__env->make('dts.users.contents.received.sections.outgoing_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
         url: base_url + "/dts/us/received-documents",
         method: 'GET',
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
         },
         dataSrc: ""
      },
      columns: [{
         data: 'his_tn'
      }, {
         data: 'number'
      }, {
         data: 'tracking_number'
      }, {
         data: null
      }, {
         data: 'type_name'
      }, {
         data: 'remarks'
      }, {
         data: 'received_date'
      }, ],
      'select': {
         'style': 'multi',
      },
      columnDefs: [{
         'targets': 0,
         'checkboxes': {
            'selectRow': true
         },
      }, {
         targets: 3,
         data: null,
         render: function (data, type, row) {
            return '<a href="' + base_url + '/dts/user/view?tn=' + row.tracking_number + '" data-toggle="tooltip" data-placement="top" title="View ' + row.tracking_number + '">' + row.document_name + '</a>';
         }
      }]
   });
});
$(document).on('click', 'button#multiple_forward', function(){
   let array = get_select_items_datatable();
   let html = '';
   if (array.length > 0) {
      $('#forward_modal').modal('show');
      $('input[name=history_track1]').val(array);
      array.forEach(element => {
         const myArray = element.split("-");
         const first = myArray[0];
         const second = myArray[1];
         html += '<li class="text-danger h3">' + second + '</li>';
      });
      $('.display_tracking_number').html(html);
   } else {
      alert('Please Select at least one');
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
         $('#forward_form2').find('button').attr('disabled', true);
         add_item(form, url);
         $('#forward_form2').find('button').attr('disabled', false);
         $('#forward_modal').modal('hide');
      }
   });
});

$(document).on('click', 'button#received_error', function(){
   selected_items = get_select_items_datatable();
   if (selected_items.length == 0) {
      alert('Please Select at least one')
   } else {
      var url = '/dts/us/r-es';
      let form = {
         items: selected_items
      };
      delete_item(form, url, button_text = 'Submit', text = 'The documents that you\'ve selected will be back to incoming section');
   }
});

$(document).on('click', 'button#outgoing', function(){
   let array = get_select_items_datatable();
   let html = '';
   if (array.length > 0) {
      $('#outgoing_modal').modal('show');
      $('input[name=history_track2]').val(array);
      array.forEach(element => {
         const myArray = element.split("-");
         const first = myArray[0];
         const second = myArray[1];
         html += '<li class="text-danger h3">' + second + '</li>';
      });
      $('.display_tracking_number1').html(html);
   } else {
      alert('Please Select at least one');
   }
});
$('#outgoing_form').on('submit', function (e) {
   e.preventDefault();
   var url = '/dts/us/out-d';
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
         $('#outgoing_form').find('button').attr('disabled', true);
         add_item(form, url);
         $('#outgoing_form').find('button').attr('disabled', false);
         $('#outgoing_form')[0].reset();
         $('#outgoing_modal').modal('hide');
      }
   });
});
$(document).on('click', 'a#forward_icon', function(){
   $('input[name=history_id]').val($(this).data('history-id'));
   $('input[name=tracking_number]').val($(this).data('tracking-number'));
   $('.offcanvas-title').text('Forward Document #' + $(this).data('tracking-number'));
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
         $('#forward_form').find('button').attr('disabled', true);
         add_item(form, url);
         $('#forward_form').find('button').attr('disabled', false);
        
      }
   });
});
$('a#received_error').on('click', function () {
   var url = '/dts/us/r-e';
   var history_id = $(this).data('history-id');
   var tracking_number = $(this).data('tracking-number');
   let form = {
      history_id: history_id,
      tracking_number: tracking_number
   };
   Swal.fire({
      title: "Received Error?",
      text: "This document will be back to incoming section | DOCUMENT NO. " + tracking_number,
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Submit"
   }).then((result) => {
      if (result.isConfirmed) {
         add_item(form, url);
      }
   });
});


introJs().setOptions(
      
      {
          "dontShowAgain": true,
          showProgress: true,          
steps: [{
  title: 'Welcome',
  intro: 'Hello Ka people of CPESD There\'s a new update! 👋'
},
{
  title: 'Forward Button',
  element: document.querySelector('#multiple_forward'),
  intro: 'You can forward multiple documents by selecting row/\'s in received table'
},
{
  title: 'Received Error Button',
  element: document.querySelector('#received_error'),
  intro: 'You can do received error by selecting row/\'s in received table'
},
{
  title: 'Outgoing Button',
  element: document.querySelector('#outgoing'),
  intro: 'You can outgoing multiple documents by selecting row/\'s in received table'
}

]
},

).start();
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dts.users.layout.user_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS2.0\resources\views/dts/users/contents/received/received.blade.php ENDPATH**/ ?>