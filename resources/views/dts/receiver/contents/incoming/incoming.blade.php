@extends('dts.receiver.layout.receiver_master')
<!-- @section('title', 'Dashboard') -->
@section('content')
@include('global_includes.title')
@include('dts.receiver.contents.incoming.sections.incoming_table')





@endsection



@section('js')

<script type="text/javascript">



$('a.received_document').on('click', function(){

   var id = $(this).data('id');
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
       received_document(id);
     }
   });
});

function received_document(id){
      let data = {id:id};
      var url = '/dts/us/receive-document';
      update_item(id='',data,url);
}

</script>

@endsection