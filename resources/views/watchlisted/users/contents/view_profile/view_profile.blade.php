@extends('watchlisted.users.layout.user_watchlisted_master')
@section('title', $title)
@section('content')
@include('global_includes.title')
<div class="row">
	<div class="col-md-7">
		@include('watchlisted.users.contents.view_profile.sections.info')
	</div>
	
</div>


<div class="row">
	<div class="col-md-7">
		@include('watchlisted.users.contents.view_profile.sections.records_table')
	</div>
	<?php
	if (session('watch_id') == $person_data->user_id) {
	?>
		<div class="col-md-5">
			@include('watchlisted.users.contents.view_profile.sections.add_form')
		</div>

	<?php } ?>
</div>
@include('watchlisted.users.contents.view_profile.sections.off_canvas')
@include('watchlisted.users.contents.view_profile.sections.update_canvas')
@endsection

@section('js')
<script>
	$('a#remove').on('click', function(e) {
		var id = $(this).data('id');
		var url = '/wl/user/delete-record';
		delete_item(id, url);
	});


	$('a#update').on('click', function() {
		var id = $(this).data('record-id');
		var record = $(this).data('record');
		$('input[name=record_id]').val(id);
		$('textarea[name=record_description]').val(record);
		$('#add_form').find('button.submit').text('Update');
		$('#add_form').find('button.cancel_update').attr('hidden', false);
		$('.card-title').text('Update Record');
	});

	$('#add_form').find('button.cancel_update').on('click', function() {
		$(this).attr('hidden', true);
		$('input[name=record_id]').val('');
		$('input[name=record_description]').val('');
		$('#add_form').find('button.submit').text('Submit');
		$('.card-title').text('Add Program');
	});


	$('#add_form').on('submit', function(e) {
		e.preventDefault();
		var form = $(this).serialize();
		var id = $('input[name=record_id]').val();
		var person_id = $('input[name=person_id]').val();

		if (!id) {
			var url = '/wl/user/add-record';
			add_item(form, url);
			// add_record(url,form,person_id);
		} else {
			var url = '/wl/user/update-record';
			update_item(id, form, url);

		}

		$('#add_form').find('button').attr('disabled', true);

	});




	$('#program_form').on('submit', function(e) {
		e.preventDefault();
		items = [];
		$("input[name=program_id]:checked").map(function(item) {
			items.push($(this).val());

		});
		var person_id = $('input[name=person_id]').val();
		var url = '/wl/user/s-p-p';
		var data = {
			id: items,
			person_id: person_id
		};
		add_item(data, url);

		$('#program_form').find('button').attr('disabled', true);

	});

	$('button.update_information_button').on('click', function(e) {
		var name = $('td.name').text();
		$('.update-information').html('Update ' + '<span class="text-danger">"' + name + '"</span>' + ' Information');
	});


	$('#update_information').on('submit', function(e) {
		e.preventDefault();

		var url = '/wl/user/update';
		var form = $('#update_information').serialize();
		update_item(id = '', form, url);
		$('#update_information').find('button').attr('disabled', true);

	});
</script>
@endsection