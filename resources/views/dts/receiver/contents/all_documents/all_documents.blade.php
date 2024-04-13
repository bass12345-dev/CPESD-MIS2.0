@extends('dts.receiver.layout.receiver_master')
@section('title', $title)
@section('content')
@include('global_includes.title')
@include('dts.receiver.contents.all_documents.sections.all_documents_table')

@endsection



@section('js')
@include('dts.includes.datatable')
@endsection