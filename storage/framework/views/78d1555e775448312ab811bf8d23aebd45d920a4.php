
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
   <div class="col-md-12 col-12   ">
      <?php echo $__env->make('dts.users.contents.my_documents.sections.document_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

   </div>
</div>
<?php echo $__env->make('dts.users.contents.my_documents.modals.print_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('dts.users.contents.my_documents.modals.update_document_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php echo $__env->make('dts.includes.datatable_with_select', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>


   $(document).ready(function(){
      var document_table = $("#my_document_table").DataTable({
          responsive: true,
         ordering: false,
         processing: true,
         searchDelay: 500,

         pageLength: 25,
         language: { "processing": '<div class="d-flex justify-content-center "> <img class="top-logo mt-4" src="<?php echo e(asset("assets/img/peso_logo.png")); ?>"></div>' },
         layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    },
  
            ajax: {
                url: "https://preview.keenthemes.com/api/datatables.php",
            },
            columns: [
                { data: 'RecordID' },
                { data: 'Name' },
                { data: 'Email' },
                { data: 'Company' },
                { data: 'CreditCardNumber' },
                { data: 'Datetime' },
                { data: 'Datetime' },
                { data: null },
            ],

            'columnDefs': [
         {
            'targets': 0,
            'checkboxes': {
               'selectRow': true
            }
         }
      ],

      'select': {
         'style': 'multi'
      },
         
         

      });
      
   })



   $('a.update_document').on('click', function() {
      $('input[name=t_number]').val($(this).data('tracking-number'));
      $('input[name=document_name]').val($(this).data('name'));
      $('select[name=document_type]').val($(this).data('type'));
      $('textarea[name=description]').val($(this).data('description'));
      $('select[name=origin]').val($(this).data('origin'));
      console.log($(this).data('origin'));
      // $('select[name=type]').val($(this).data('destination'));
   });

   $('#update_document').on('submit', function(e) {
      e.preventDefault();
      var url = '/dts/us/update-document';
      var form = $('form#update_document').serialize();
      var id = $('input[name=t_number]').val();
      update_item(id, form, url);
   });

   $('a.remove_document').on('click', function() {

      var id = $(this).data('id');
      var t = $(this).data('track');

      let form = {
         id: id
      }
      var url = '/dts/us/delete-my-document';
      delete_item(form, url, button_text = 'Remove Document', text = "Document #" + t)

   });

   $('a.print_button').on('click', function(){
      
      var id               =     $(this).data('id');
      var name             =     $(this).data('name');
      var track            =     $(this).data('track');
      var document_type    =     $(this).data('type');
      var created          =     $(this).data('received');
      var encoded_by       =     $(this).data('encoded-by');
      var destination      =     $(this).data('destination');
      var description      =     $(this).data('description');
      var origin           =     $(this).data('origin');

      $('#print_slip_modal').find('.document_name').text(name);
      $('#print_slip_modal').find('.print_tracking_number').text(track);
      $('#print_slip_modal').find('.document_type').text(document_type);
      $('#print_slip_modal').find('.created').text(created);
      $('#print_slip_modal').find('.encoded_by').text(encoded_by);
      $('#print_slip_modal').find('.type').text(destination);
      $('#print_slip_modal').find('.description').text(description);
      $('#print_slip_modal').find('.origin').text(origin);
      $('#print_slip_modal').modal('show');

     
   });






   function print_slip() {

      var div = document.getElementById("slip").innerHTML;
      var a = window.open('', '');
      a.document.write('<html><title>Routing Slip</title>');

      a.document.write('<body>');
      a.document.write(div);
      a.document.write('</body></html>');
      a.document.close();
      a.print();
   }

   $('a#print_slips').on('click', function(){

      var selected_items = get_select_items_datatable();
      if(selected_items.length  == 0){
         alert('Please Select at least one')
      }else{
         var a = window.open(base_url + '/dts/user/print-slips/?ids='+selected_items, '__blank');
      }
   });

  



</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dts.users.layout.user_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/users/contents/my_documents/my_documents.blade.php ENDPATH**/ ?>