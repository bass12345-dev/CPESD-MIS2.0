@extends('dts.users.layout.user_master')
@section('title', $title)
@section('content')

@include('global_includes.title')
<div class="row">
   <div class="col-12 col-md-12">
       @include('dts.users.contents.track.sections.document_information')
   </div>
</div>

<div class="row">
    <div class="col-12  col-md-12 ">
        @include('dts.users.contents.track.sections.history')
    </div>
</div>


@endsection
@section('js')


@endsection