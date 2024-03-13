@extends('dts.admin.layout.admin_master')
@section('title', $title)
@section('content')
@include('global_includes.title')
@include('dts.admin.contents.dashboard.sections.count_section1')
@include('dts.admin.contents.dashboard.sections.count_section2')
@include('dts.admin.contents.dashboard.sections.count_section3')
@endsection
@section('js')
@endsection