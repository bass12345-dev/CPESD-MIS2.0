@extends('dts.admin.layout.admin_master')
@section('title', $title)
@section('content')

@include('global_includes.title')
<div class="row">
   <div class="col-12 col-md-12">
       @include('dts.admin.contents.view.sections.document_information')
   
   </div>
   
   
</div>
<div class="row">
   
   <div class="col-12  col-md-12 ">
       @include('dts.admin.contents.view.sections.history')
   </div>
   
</div>
@endsection
@section('js')

<script>

</script>

@endsection