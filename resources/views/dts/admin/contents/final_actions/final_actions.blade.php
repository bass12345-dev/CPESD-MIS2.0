@extends('dts.admin.layout.admin_master')
@section('title', $title)
@section('content')
@include('global_includes.title')
<div class="row">
   <div class="col-12  col-md-7 ">
      @include('dts.admin.contents.final_actions.sections.actions_table')
   </div>
   <div class="col-12 col-md-5">
    @include('dts.admin.contents.final_actions.sections.add_actions')
   </div>
</div>
@endsection
@section('js')
<script>
$('a#remove').on('click', function(){
   var id = $(this).data('id');
   var url = '/dts/delete-action';
   delete_item(id,url);
});

$('a#update').on('click', function(){
   var id = $(this).data('id');
   var item_name = $(this).data('name');
   $('input[name=id]').val(id);
   $('input[name=type]').val(item_name);
   $('#add_form').find('button.submit').text('Update');
   $('#add_form').find('button.cancel_update').attr('hidden', false);
   $('.card-title').text('Update '+item_name+ ' Action');
});

$('#add_form').find('button.cancel_update').on('click', function(){
   $(this).attr('hidden',true);
   $('input[name=id]').val('');
   $('input[name=type]').val('');
   $('#add_form').find('button.submit').text('Submit');
    $('.card-title').text('Add Action');
});

$('#add_form').on('submit', function (e) {
   e.preventDefault();
   var form = $(this).serialize();
   var id = $('input[name=id]').val();

   if (!id) {
     var url = '/dts/add-action';
     add_item(form,url);
   }else {
      var url = '/dts/update-action/';
      update_item(id,form,url);
   }

    $('#add_form').find('button').attr('disabled',true);
});

</script>

@endsection