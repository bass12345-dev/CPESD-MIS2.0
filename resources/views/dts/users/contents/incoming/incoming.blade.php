@extends('dts.users.layout.user_master')
@section('title', $title)
@section('content')

@include('global_includes.title')
<div class="row">
   <div class="col-md-12 col-12   ">
      @include('dts.users.contents.incoming.sections.incoming_table')
   </div>
</div>
@endsection
@section('js')

<script>



$('a.received_document').on('click', function(){

   var id = $(this).data('id');
   var t = $(this).data('track');
   Swal.fire({
     title: "Are you sure?",
     text: 'Click "RECEIVE BUTTON" if the document is on your table | DOCUMENT NO. #'+t,
     icon: "warning",
     showCancelButton: true,
     confirmButtonColor: "#3085d6",
     cancelButtonColor: "#d33",
     confirmButtonText: "Received Document"
   }).then((result) => {
     if (result.isConfirmed) {
      
       received_document(id,t);
     }
   });
});

function received_document(id,t){
      let form = {
                  id : id,
                  tracking_number : t
                  }
      var url = '/dts/us/receive-document';
   
      add_item(form,url);
}


$('a#received_documents').on('click', function(){

selected_items = get_selected_items();


// if(selected_items.length  == 0){
//    alert('Please Select at least one')
// }else{
//    var a = window.open(base_url + '/dts/user/print-slips/?ids='+selected_items, '__blank');
// }



});
</script>

@endsection