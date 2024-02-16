@extends('dts.users.layout.user_master')
@section('title', $title)
@section('content')
@include('dts.includes.title')
@include('dts.users.contents.dashboard.sections.count_section')
@endsection
@section('js')
@endsection