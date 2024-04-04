@extends('dts.admin.layout.admin_master')
@section('title', $title)
@section('content')
@include('global_includes.title')
@include('dts.admin.contents.all_documents.sections.all_documents_table')
@include('dts.receiver.contents.received.sections.final_action_off_canvas')
@endsection
@section('js')
<script>
$('button#delete').on('click', function(){
    var button_text = 'Delete selected items';
    var url = '/dts/delete-documents';
    let items = get_selected_items();
    var data = {id : items};

    if(items.length  == 0){
      alert('Please Select at least one')
    }else{
      delete_item(data,url,button_text);
    }
   
});


$('button#cancel').on('click', function(){

   var button_text = 'Cancel selected items';
   var url = '/dts/cancel-documents';
   let items = get_selected_items();
   var data = {id : items};
   if(items.length  == 0){
      alert('Please Select at least one')
    }else{
      delete_item(data,url,button_text);
   }


});

function get_selected_items(){

   let items = [];
   $('input[name=document_id]:checked').map(function(item){items.push($(this).val());});
   return items;

}





$('a#forward_icon').on('click', function(){
   $('input[name=id]').val($(this).data('history-id'));
   $('input[name=t_number]').val($(this).data('tracking-number'));
   $('.offcanvas-title').text('Document #' +$(this).data('tracking-number') )
});


$('#forward_form').on('submit', function (e) {
   e.preventDefault();
   var url = '/dts/complete-document';
   var form = $(this).serialize();
   add_item(form,url);

});

$('input[name="dates"]').daterangepicker();

$('button#filter').on('click', function(){
   var dates         = $('input[name="dates"]').val();
   var document_type = $('select[name="select_document_types"]').val();
   var document_status = $('select[name="select_document_status"]').val();
   var date = dates.split(' - ');
   var from = date[0];
   var to = date[1];
   
   window.location.href = base_url + '/dts/admin/all-documents?from='+from+'&&to='+to+'&&type='+document_type+'&&status='+document_status;
  
});


$('a#cancel_document').on('click', function(){
var t = $(this).data('tracking-number');

let form = {t : t}
var url = '/dts/cancel-document';

Swal.fire({
     title: "Are you sure?",
     text: "",
     icon: "warning",
     showCancelButton: true,
     confirmButtonColor: "#3085d6",
     cancelButtonColor: "#d33",
     confirmButtonText: "Cancel Document #" + t
   }).then((result) => {
     if (result.isConfirmed) {
      add_item(form,url);
      
     }
});

});


$('a#revert_document').on('click', function(){
var t = $(this).data('tracking-number');

let form = {t : t}
var url = '/dts/revert-document';

Swal.fire({
     title: "Are you sure?",
     text: "",
     icon: "warning",
     showCancelButton: true,
     confirmButtonColor: "#3085d6",
     cancelButtonColor: "#d33",
     confirmButtonText: "Revert Document #" + t
   }).then((result) => {
     if (result.isConfirmed) {
      add_item(form,url);
      
     }
});

});


$('button#print_slips').on('click', function(){

selected_items = get_selected_items();
if(selected_items.length  == 0){
   alert('Please Select at least one')
}else{
   var a = window.open(base_url + '/dts/admin/print-slips/?ids='+selected_items, '__blank');
}
});
function get_selected_items(){
   let items = [];
   $('input[name=document_id]:checked').map(function(item){items.push($(this).val());});
   return items;

   }

</script>
@endsection