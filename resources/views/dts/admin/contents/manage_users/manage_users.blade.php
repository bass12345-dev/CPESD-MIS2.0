@extends('dts.admin.layout.admin_master')
@section('title', $title)
@section('content')
@include('global_includes.title')
<div class="row">
   <div class="col-md-12">
    @include('dts.admin.contents.manage_users.sections.users_table')
   </div>
</div>

@endsection
@section('js')

<script>
$('a.set-inactive').on('click', function(){
var id = $(this).data('id');
let data = {id:id,status: 'inactive'}
var url = '/dts/c-u-s';
update_item(id,data,url);
});

$('a.set-active').on('click', function(){
var id = $(this).data('id');
let data = {id:id,status: 'active'}
var url = '/dts/c-u-s';
update_item(id,data,url);
});

$('a.delete').on('click', function(){
var id = $(this).data('id');
var url = '/api/delete-user';
delete_item(id,url)
});

</script>

@endsection