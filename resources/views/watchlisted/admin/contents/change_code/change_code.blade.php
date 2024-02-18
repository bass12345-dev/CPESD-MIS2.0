@extends('watchlisted.admin.layout.watchlisted_master')
@section('title', $title)
@section('content')
@include('global_includes.title')
@include('watchlisted.admin.contents.change_code.sections.update_form')
@endsection

@section('js')
<script>

	$('#update_form').on('submit', function (e) {
		e.preventDefault();

		var id = $(this).find('input[name=id]').val();
		var old = $(this).find('input[name=old]').val();
		var new_ = $(this).find('input[name=new]').val();
		var url = '/wl/change-code';
		let arr = {
			id : id,
			old: old,
			new: new_
		};

		add_item(arr, url);
		$(this)[0].reset();
	});

</script>
@endsection