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

</script>

@endsection