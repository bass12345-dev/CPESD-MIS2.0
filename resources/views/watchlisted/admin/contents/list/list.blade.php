@extends('watchlisted.admin.layout.watchlisted_master')
@section('title', $title)
@section('content')
@include('global_includes.title')
@include('watchlisted.admin.contents.list.sections.list_table')
@endsection

@section('js')
@include('dts.includes.datatable_with_select')
<script>




$('button#remove').on('click', function(){
    var button_text = 'Submit';
    text = 'Selected individuals will be stored in restore section';
    let items = get_select_items_datatable();

    var url = '/wl/ch-stat';
    var data = {
                id : items,
                status : 'inactive'
    };
    delete_item(data,url,button_text,text);
});
</script>
@endsection