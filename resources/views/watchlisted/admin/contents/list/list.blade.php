@extends('watchlisted.admin.layout.watchlisted_master')
@section('title', $title)
@section('content')
@include('global_includes.title')
@include('watchlisted.admin.contents.list.sections.list_table')
@endsection

@section('js')
<script>

$('button#remove').on('click', function(){
    let items = [];
    var button_text = 'Remove selected items';
    $('input[name=person_id]:checked').map(function(item){

        items.push($(this).val());
    });

    var url = '/wl/ch-stat/';
    var data = {
                id : items,
                status : 'inactive'
    };
    delete_item(data,url,button_text);
});
</script>
@endsection