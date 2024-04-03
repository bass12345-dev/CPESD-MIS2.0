@extends('dts.users.layout.user_master')
@section('title', $title)
@section('content')

@include('global_includes.title')
<div class="row">
   <div class="col-md-12 col-12   ">
      @include('dts.users.contents.received.sections.received_table')
   </div>
</div>
@include('dts.users.contents.received.sections.forward_offcanvas')

@endsection
@section('js')

<script>
$('a#forward_icon').on('click', function(){
   $('input[name=history_id]').val($(this).data('history-id'));
   $('input[name=tracking_number]').val($(this).data('tracking-number'));
   $('.offcanvas-title').text('Forward Document #' +$(this).data('tracking-number') );

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
      add_item(form,url);
      $('#forward_form').find('button').attr('disabled',true);
     }
   });
 
});


$('a#received_error').on('click', function(){

   var url = '/dts/us/r-e';
   var history_id = $(this).data('history-id');
   var tracking_number = $(this).data('tracking-number');

   let form = {
      history_id : history_id,
      tracking_number : tracking_number
   }


   Swal.fire({
     title: "Received Error?",
     text: "This document will be back to incoming section | DOCUMENT NO. "+tracking_number,
     icon: "warning",
     showCancelButton: true,
     confirmButtonColor: "#3085d6",
     cancelButtonColor: "#d33",
     confirmButtonText: "Submit"
   }).then((result) => {
     if (result.isConfirmed) {
      add_item(form,url);
     
     }
   });
  

});

</script>

@endsection