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
    let items = [];
    var button_text = 'Remove selected items';
    $('input[name=document_id]:checked').map(function(item){

        items.push($(this).val());
    });

    var url = '/dts/delete-documents';
    var data = {
                id : items,
              
    };
    delete_item(data,url,button_text);
});


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
</script>
@endsection