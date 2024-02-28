@extends('dts.users.layout.user_master')
@section('title', $title)
@section('content')

@include('global_includes.title')
@include('dts.users.contents.search.sections.search_form')

@endsection
@section('js')

<script type="text/javascript">

  $('form#search_form').on('submit', function (e) {
    e.preventDefault();
    window.location.href = base_url + '/dts/user/view?tn=' + $('input[name=tracking_number]').val();
  })

</script>

@endsection