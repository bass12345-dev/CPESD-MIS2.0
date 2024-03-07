@extends('dts.receiver.layout.receiver_master')
<!-- @section('title', 'Dashboard') -->
@section('content')
@include('global_includes.title')
@include('dts.receiver.contents.incoming.sections.incoming_table')
@include('dts.receiver.contents.incoming.modal.final_action_modal')
@endsection



@section('js')

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
</script>

@endsection