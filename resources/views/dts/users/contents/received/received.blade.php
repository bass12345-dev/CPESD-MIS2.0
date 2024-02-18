@extends('dts.users.layout.user_master')
@section('title', $title)
@section('content')

@include('global_includes.title')
<div class="row">
   <div class="col-md-12 col-12   ">
      @include('dts.users.contents.received.sections.received_table')
   </div>
</div>
@include('dts.users.contents.received.sections.forward_offcanvas')

@endsection
@section('js')

<script>
$('a#forward_icon').on('click', function(){
   $('input[name=history_id]').val($(this).data('history-id'));
   $('input[name=tracking_number]').val($(this).data('tracking-number'));
   $('.offcanvas-title').text('Forward Document #' +$(this).data('tracking-number') )
})

$('#forward_form').on('submit', function (e) {
   e.preventDefault();
   var url = '/dts/us/forward-document';
   var form = $(this).serialize();
   add_item(form,url);
    $('#forward_form').find('button').attr('disabled',true);
});


</script>

@endsection