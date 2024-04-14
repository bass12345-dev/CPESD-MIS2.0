@extends('watchlisted.users.layout.user_watchlisted_master')
@section('title', $title)
@section('content')
@include('global_includes.title')
<div class="row">
   <div class="col-md-12 col-12   ">
      @include('watchlisted.users.contents.pending_list.sections.pending_table')
   </div>
</div>
@endsection
@section('js')
@include('dts.includes.datatable_with_select')
<script>


   $('button#delete').on('click', function() {

      var button_text = 'Delete selected items';
      var url = '/wl/user/d-p';
      let items = get_select_items_datatable();

      var data = {
         id: items
      };
      if (items.length == 0) {
         alert('Please Select at least one')
      } else {
         delete_item(data, url, button_text);
      }


   });


</script>
@endsection