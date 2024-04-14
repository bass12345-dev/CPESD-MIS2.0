@extends('dts.users.layout.user_master')
@section('title', $title)
@section('content')

@include('global_includes.title')
<div class="row">
   <div class="col-md-12 col-12   ">
   @include('dts.users.contents.outgoing.sections.outgoing_table')
   </div>
</div>
@endsection
@section('js')
@include('dts.includes.datatable_with_select')


@endsection