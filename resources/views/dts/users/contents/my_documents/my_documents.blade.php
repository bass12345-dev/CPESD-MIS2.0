@extends('dts.users.layout.user_master')
@section('title', $title)
@section('content')

@include('global_includes.title')
<div class="row">
   <div class="col-md-12 col-12   ">
      @include('dts.users.contents.my_documents.sections.document_table')
   </div>
</div>

@include('dts.users.contents.my_documents.modals.update_document_modal')
@endsection
@section('js')

<script>

$('a.update_document').on('click', function(){
   $('input[name=t_number]').val($(this).data('tracking-number'));
   $('input[name=document_name]').val($(this).data('name'));
   $('select[name=document_type]').val($(this).data('type'));
   $('textarea[name=description]').val($(this).data('description'));
   // $('select[name=type]').val($(this).data('destination'));
});

$('#update_document').on('submit', function(e){
   e.preventDefault();
   var url  = '/dts/us/update-document';
   var form = $('form#update_document').serialize();
   var id   = $('input[name=t_number]').val();
   update_item(id,form,url);
});

$('a.remove_document').on('click', function(){

var id = $(this).data('id');
var t = $(this).data('track');

let form = {id : id}
var url = '/dts/us/delete-my-document';
delete_item(form,url,button_text = 'Remove Document',text = "Document #" + t)

});

$('a.cancel_document').on('click', function(){
var id = $(this).data('id');
var t = $(this).data('track');


let form = {id : id}
var url = '/dts/us/c-doc';


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
</script>

@endsection