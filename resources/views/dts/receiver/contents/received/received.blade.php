@extends('dts.receiver.layout.receiver_master')
@section('title', $title)
@section('content')
@include('global_includes.title')
@include('dts.receiver.contents.received.sections.received_table')
@include('dts.receiver.contents.received.sections.final_action_off_canvas')
@endsection
@section('js')



<script type="text/javascript">

$('a#forward_icon').on('click', function(){
   $('input[name=id]').val($(this).data('history-id'));
   $('input[name=t_number]').val($(this).data('tracking-number'));
   $('.offcanvas-title').text('Document #' +$(this).data('tracking-number') )
});


$('#forward_form').on('submit', function (e) {
   e.preventDefault();
   var url = '/dts/r/complete-document';
   var form = $(this).serialize();
   add_item(form,url);

});
</script>

@endsection