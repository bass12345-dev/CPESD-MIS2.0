@extends('watchlisted.admin.layout.watchlisted_master')
@section('title', $title)
@section('content')
@include('global_includes.title')
<div class="row">
	<div class="col-md-7">
@include('watchlisted.admin.contents.view_profile.sections.info')
	</div>
	<div class="col-md-5">
@include('watchlisted.admin.contents.view_profile.sections.program_block')
	</div>
</div>


<div class="row">
	<div class="col-md-7">
@include('watchlisted.admin.contents.view_profile.sections.records_table')
	</div>
	<div class="col-md-5">
@include('watchlisted.admin.contents.view_profile.sections.add_form')
	</div>
</div>
@include('watchlisted.admin.contents.view_profile.sections.off_canvas')

@endsection

@section('js')
<script>
$('a#remove').on('click', function(e){
	var id = $(this).data('id');
	var url = '/wl/delete-record';
	delete_item(id,url);
});


$('a#update').on('click', function(){
   var id = $(this).data('record-id');
   var record = $(this).data('record');
   $('input[name=record_id]').val(id);
   $('textarea[name=record_description]').val(record);
   $('#add_form').find('button.submit').text('Update');
   $('#add_form').find('button.cancel_update').attr('hidden', false);
   $('.card-title').text('Update Record');
});

$('#add_form').find('button.cancel_update').on('click', function(){
   $(this).attr('hidden',true);
   $('input[name=record_id]').val('');
   $('input[name=record_description]').val('');
   $('#add_form').find('button.submit').text('Submit');
    $('.card-title').text('Add Program');
});


$('#add_form').on('submit', function (e) {
   e.preventDefault();
   var form = $(this).serialize();
   var id = $('input[name=record_id]').val();
   var person_id = $('input[name=person_id]').val();

   if (!id) {
   		var url = '/wl/add-record';
         add_item(form,url);
   		// add_record(url,form,person_id);
   }else {
      var url = '/wl/update-record';
      update_item(id,form,url);
      
   }

    $('#add_form').find('button').attr('disabled',true);

});




$('#program_form').on('submit', function(e){
	e.preventDefault();
	items = [];
	$("input[name=program_id]:checked").map(function(item){
		items.push($(this).val());
		
	});
	 var person_id = $('input[name=person_id]').val();
	var url = '/wl/s-p-p';
	var data = {
				id : items,
				person_id : person_id
	};
	add_item(data,url);

    $('#program_form').find('button').attr('disabled',true);

})
</script>
@endsection