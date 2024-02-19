@extends('watchlisted.admin.layout.watchlisted_master')
@section('title', $title)
@section('content')
@include('global_includes.title')
@include('watchlisted.admin.contents.restore.sections.restore_table')
@endsection

@section('js')
<script>



$('button#delete').on('click', function(){
    let items = [];
    $('input[name=person_id]:checked').map(function(item){

        items.push($(this).val());
    });

    var url = '/wl/delete';
    var data = {
                id : items,
  
    };
   delete_item(data,url);
    
});


$('button#restore').on('click', function(){
    let items = [];
    var button_text = 'Restore selected items';
    $('input[name=person_id]:checked').map(function(item){

        items.push($(this).val());
    });

    var url = '/wl/ch-stat';
    var data = {
                id : items,
                status : 'active'
  
    };
   delete_item(data,url,button_text);
    
});
</script>
@endsection