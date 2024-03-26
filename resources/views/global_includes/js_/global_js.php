<script>
    $(document).on('click', 'span.show_con', function() {
		var input = $('input.password');
		var show_eye = $('i.show_icon');
		var hide_eye = $('i.hidden_icon');
		show_icon(input, show_eye, hide_eye)
	});

	function show_icon(input, show_eye, hide_eye) {
		if (input.attr('type') === 'password') {
			input.prop('type', 'text');
			show_eye.attr('hidden', true)
			hide_eye.removeAttr('hidden')
		} else {
			input.prop('type', 'password');
			hide_eye.attr('hidden', true)
			show_eye.removeAttr('hidden')
		}

	}
</script>