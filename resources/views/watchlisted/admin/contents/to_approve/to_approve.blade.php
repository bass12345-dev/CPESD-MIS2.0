@extends('watchlisted.admin.layout.watchlisted_master')
@section('title', $title)
@section('content')
@include('global_includes.title')
@include('watchlisted.admin.contents.to_approve.sections.to_approve_table')
@endsection

@section('js')
<script>

$('button#delete').on('click', function() {

var button_text = 'Delete selected items';
var url = '/wl/delete';
let items = get_selected_items();

var data = {
   id: items
};
if (items.length == 0) {
   alert('Please Select at least one')
} else {
   delete_item(data, url, button_text);
}
});

$('button#approve').on('click', function() {

var button_text = 'Approve selected items';
var url = '/wl/app-p';
let items = get_selected_items();

var data = {
   id: items
};
if (items.length == 0) {
   alert('Please Select at least one')
} else {
   delete_item(data, url, button_text);
}
});


</script>
@endsection
