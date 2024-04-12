@extends('dts.admin.layout.admin_master')
@section('title', $title)
@section('content')
@include('global_includes.title')
<div class="row">
   <div class="col-12  col-md-7 ">
      @include('dts.admin.contents.offices.sections.offices_table')
   </div>
   <div class="col-12 col-md-5">
      @include('dts.admin.contents.offices.sections.add_office')
   </div>
</div>
@endsection
@section('js')
@include('dts.includes.datatable')
<script>
   $('a#remove_office').on('click', function () {
      var id = $(this).data('id');
      var url = '/dts/delete-office';
      delete_item(id, url);
   });

   $('a#update_office').on('click', function () {
      var id = $(this).data('id');
      var office = $(this).data('office');
      $('input[name=office_id]').val(id);
      $('input[name=office]').val(office);
      $('#add_office').find('button.submit').text('Update');
      $('#add_office').find('button.cancel_update').attr('hidden', false);
      $('.card-title').text('Update ' + office + ' Office');
   });

   $('#add_office').find('button.cancel_update').on('click', function () {
      $(this).attr('hidden', true);
      $('input[name=office_id]').val('');
      $('input[name=office]').val('');
      $('#add_office').find('button.submit').text('Submit');
      $('.card-title').text('Add Office');
   });

   $('#add_office').on('submit', function (e) {
      e.preventDefault();
      var form = $(this).serialize();
      var id = $('input[name=office_id]').val();

      if (!id) {
         var url = '/dts/add-office';
         add_item(form, url);
      } else {
         var url = '/dts/update-office';
         update_item(id, form, url);

      }

      $('#add_office').find('button').attr('disabled', true);

   });
</script>
@endsection