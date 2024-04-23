
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('dts.receiver.contents.incoming.sections.incoming_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('dts.receiver.contents.incoming.modal.final_action_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('dts.receiver.contents.incoming.modal.add_note_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('js'); ?>
<!-- <?php echo $__env->make('dts.includes.datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->
<script type="text/javascript">
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
         url: base_url + "/dts/r/g-r-i-d",
         method: 'GET',
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
         },
         dataSrc: ""
      },
      columns: [{
         data: null,
      },
       {
         data: 'number'
      }, 
    {
         data: 'tracking_number'
      }, {
         data: null
      }, {
         data: 'from'
      }, {
         data: 'type_name'
      }, {
         data: 'remarks'
      }, {
         data: 'released_date'
      }, ],
      // 'select': {
      //    'style': 'multi',
      // },
      columnDefs: [
      //   {
      //    'targets': 0,
      //    'checkboxes': {
      //       'selectRow': true
      //    },
      // }, 
      {
         targets: 0,
         data: null,
         render: function (data, type, row) {
            return ' <a class="btn btn-success received_document" data-track="'+row.tracking_number+'"  data-id="'+row.history_id+'"><i class="fas fa-hand"></i></a> ';
         }
      },
      {
         targets: 3,
         data: null,
         render: function (data, type, row) {
            return '<a href="' + base_url + '/dts/user/view?tn=' + row.tracking_number + '" data-toggle="tooltip" data-placement="top" title="View ' + row.tracking_number + ' ?>">' + row.document_name + '</a>';
         }
      }
    ]
   });
});

$(document).on('click', 'a.received_document', function(){
    var id = $(this).data('id');
    var track = $(this).data('track');
    Swal.fire({
      title: "Are you sure?",
      text: "",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Received Document"
    }).then((result) => {
      if (result.isConfirmed) {
        received_document(id,track);
      }
    });
  });

  function received_document(id,track) {
    let data = {
      id: id,
      tracking_number : track
    };

    var url = '/dts/us/receive-document';

    $.ajax({
      url: base_url + url,
      method: 'POST',
      data: data,
      dataType: 'json',
      beforeSend : function(){
            loader();
      },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      success: function(data) {
        JsLoadingOverlay.hide();
        if(data.response) {
          Swal.fire({
                  position: "top-end",
                  icon: "success",
                  title: data.message,
                  showConfirmButton: false,
                  timer: 1500
               });
          $('#final_action_modal').modal('show');
          $('#forward_form').find('input[name=id]').val(data.id);
          $('#forward_form').find('input[name=t_number]').val(data.tracking_number);
        }else {
          alert('something Wrong');
          
          // location.reload();
        }
      },
      error: function() {
        JsLoadingOverlay.hide();
        alert('something Wrong')
      }

    });


  }

  $('#forward_form').on('submit', function (e) {
   e.preventDefault();
   var url = '/dts/r/complete-document';
   var form = $(this).serialize();
   $('#forward_form').find('button').attr('disabled', true);
   add_item(form,url);
   $('#forward_form').find('button').attr('disabled', false);
   $('#forward_form')[0].reset();
   $('#final_action_modal').modal('hide');

});

$('form#update_note').on('submit', function (e) {
   e.preventDefault();
   var url = '/dts/r/a-n';
   var form = $(this).serialize();
   add_item(form,url);

});


$('button.update_note').on('click', function() {
  $('#update_note').attr('hidden',false);
  $(this).attr('hidden',true);

  //  
});

$('button.close_add_note').on('click', function() {
  $('#update_note').attr('hidden',true);
  $('button.update_note').attr('hidden',false);
});


$('a.add-note').on('click', function() {

    $('#add_note_modal').modal('show');
    var document_id = $(this).data('id');
    $('#update_note').attr('hidden',true);
    $('button.update_note').attr('hidden',false);
    $('input[name=document_id]').val(document_id);
    var note = $(this).data('note')
    $('#add_note_modal').find('p.note').text(note);
    $('textarea[name=note]').val(note);


});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dts.receiver.layout.receiver_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS2.0\resources\views/dts/receiver/contents/incoming/incoming.blade.php ENDPATH**/ ?>