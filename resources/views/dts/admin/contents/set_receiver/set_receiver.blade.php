@extends('dts.admin.layout.admin_master')
@section('title', $title)
@section('content')
@include('global_includes.title')
@include('dts.admin.contents.set_receiver.sections.set_receiver_form')
<hr>
@include('dts.admin.contents.set_receiver.sections.set_oic_form')
@endsection
@section('js')
<script>
    $('#update_receiver_form').on('submit', function (e) {
      e.preventDefault();
      var form = $(this).serialize();
      var id = '';
      var url = '/dts/u-r';
      update_item(id,form,url);
     
      $('#update_receiver_form').find('button').attr('disabled',true);
   });


   $('#update_oic_form').on('submit', function (e) {
      e.preventDefault();
      var form = $(this).serialize();
      var id = '';
      var url = '/dts/u-oic';
      update_item(id,form,url);
     
      $('#update_oic_form').find('button').attr('disabled',true);
   });

</script>
@endsection