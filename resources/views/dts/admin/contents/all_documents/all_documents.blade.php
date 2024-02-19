@extends('dts.admin.layout.admin_master')
@section('title', $title)
@section('content')
@include('global_includes.title')
@include('dts.admin.contents.all_documents.sections.all_documents_table')
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
</script>
@endsection