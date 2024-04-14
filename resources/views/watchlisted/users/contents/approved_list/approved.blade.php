@extends('watchlisted.users.layout.user_watchlisted_master')
@section('title', $title)
@section('content')
@include('global_includes.title')
<div class="row">
   <div class="col-md-12 col-12   ">
      @include('watchlisted.users.contents.approved_list.sections.approved_table')
   </div>
</div>
@endsection
@section('js')
@include('dts.includes.datatable')
@endsection