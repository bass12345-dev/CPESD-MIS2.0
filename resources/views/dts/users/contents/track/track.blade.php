@extends('dts.users.layout.user_master')
@section('title', $title)
@section('content')

@include('global_includes.title')
<div class="row">
   <div class="col-12 col-md-5">
       @include('dts.users.contents.track.sections.document_information')
   
   </div>
   <div class="col-12  col-md-7 ">
       @include('dts.users.contents.track.sections.history')
   </div>
   
</div>
@endsection
@section('js')


@endsection