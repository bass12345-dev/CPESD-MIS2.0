@extends('watchlisted.admin.layout.watchlisted_master')
@section('title', $title)
@section('content')
@include('global_includes.title')
<div class="row">
	<div class="col-md-7">
		@include('watchlisted.admin.contents.manage_program.sections.program_table')
	</div>
	<div class="col-md-5">
		@include('watchlisted.admin.contents.manage_program.sections.add_form')
	</div>
</div>

@endsection

@section('js')
@include('dts.includes.datatable')
<script>
$('a#remove').on('click', function(){
   var id = $(this).data('id');
   var url = '/wl/delete-program';
   delete_item(id,url);
   setTimeout(reload_page, 2000)
});



$('a#update').on('click', function(){
   var id = $(this).data('id');
   var item_name = $(this).data('name');
   var item_description = $(this).data('description');
   $('input[name=id]').val(id);
   $('input[name=program]').val(item_name);
   $('textarea[name=program_description]').val(item_description);
   $('#add_form').find('button.submit').text('Update');
   $('#add_form').find('button.cancel_update').attr('hidden', false);
   $('.card-title').text('Update '+item_name+ ' Program');
});

$('#add_form').find('button.cancel_update').on('click', function(){
   $(this).attr('hidden',true);
   $('input[name=id]').val('');
   $('input[name=program]').val('');
   $('textarea[name=program_description]').val('');
   $('#add_form').find('button.submit').text('Submit');
    $('.card-title').text('Register Programs');
});



$('#add_form').on('submit', function (e) {
   e.preventDefault();
   var form = $(this).serialize();
   var id = $('input[name=id]').val();
   $('#add_form').find('button').attr('disabled',true);
   if (!id) {
     var url = '/wl/add-program';
     add_item(form,url);
   }else {
      var url = '/wl/update-program';
      update_item(id,form,url);
      
   }
   $('#add_form').find('button').attr('disabled',false);
   $('#add_form')[0].reset();
   setTimeout(reload_page, 2000)
   

});

</script>
@endsection