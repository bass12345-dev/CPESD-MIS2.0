@extends('watchlisted.admin.layout.watchlisted_master')
@section('title', $title)
@section('content')
@include('global_includes.title')
@include('watchlisted.admin.contents.restore.sections.restore_table')
@endsection

@section('js')
@include('dts.includes.datatable_with_select')
<script>



$('button#delete').on('click', function(){
    let items = get_select_items_datatable();
    var url = '/wl/delete';
    var data = {
                id : items,
  
    };
   delete_item(data,url);
    
});


$('button#restore').on('click', function(){
    var button_text = 'Submit';
    text = 'Selected individuals will be back to active list';
    let items = get_select_items_datatable();
    var url = '/wl/ch-stat';
    var data = {
                id : items,
                status : 'active'
  
    };
   delete_item(data,url,button_text,text);
    
});
</script>
@endsection