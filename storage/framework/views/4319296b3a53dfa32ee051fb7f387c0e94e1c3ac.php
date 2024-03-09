
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('dts.receiver.contents.incoming.sections.incoming_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('dts.receiver.contents.incoming.modal.final_action_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('dts.receiver.contents.incoming.modal.add_note_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('js'); ?>

<script type="text/javascript">
  $('a.received_document').on('click', function() {

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
      track : track
    };

    

    var url = '/dts/us/receive-document';

    $.ajax({
      url: base_url + url,
      method: 'POST',
      data: data,
      dataType: 'json',
      beforeSend: function() {
        Swal.showLoading()
      },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      success: function(data) {
        
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
          location.reload();
        }
      },
      error: function() {
        Swal.close();
        alert('something Wrong')
      }

    });


  }

  $('#forward_form').on('submit', function (e) {
   e.preventDefault();
   var url = '/dts/r/complete-document';
   var form = $(this).serialize();
   add_item(form,url);

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
<?php echo $__env->make('dts.receiver.layout.receiver_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/receiver/contents/incoming/incoming.blade.php ENDPATH**/ ?>