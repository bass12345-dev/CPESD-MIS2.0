@extends('watchlisted.users.layout.user_watchlisted_master')
@section('title', $title)
@section('content')
@include('global_includes.title')
@include('watchlisted.users.contents.dashboard.sections.count')
@endsection
@section('js')
@endsection