@extends('dts.users.layout.user_master')
@section('title', $title)
@section('content')

@include('global_includes.title')
<div class="row">
   <div class="col-md-12 col-12   ">
      @include('dts.users.contents.my_documents.sections.document_table')

   </div>
</div>
@include('dts.users.contents.my_documents.modals.print_modal')
@include('dts.users.contents.my_documents.modals.update_document_modal')
@endsection
@section('js')
@include('dts.includes.datatable_with_select')
<script>




   $('a.update_document').on('click', function() {
      $('input[name=t_number]').val($(this).data('tracking-number'));
      $('input[name=document_name]').val($(this).data('name'));
      $('select[name=document_type]').val($(this).data('type'));
      $('textarea[name=description]').val($(this).data('description'));
      $('select[name=origin]').val($(this).data('origin'));
      console.log($(this).data('origin'));
      // $('select[name=type]').val($(this).data('destination'));
   });

   $('#update_document').on('submit', function(e) {
      e.preventDefault();
      var url = '/dts/us/update-document';
      var form = $('form#update_document').serialize();
      var id = $('input[name=t_number]').val();
      update_item(id, form, url);
   });

   $('a.remove_document').on('click', function() {

      var id = $(this).data('id');
      var t = $(this).data('track');

      let form = {
         id: id
      }
      var url = '/dts/us/delete-my-document';
      delete_item(form, url, button_text = 'Remove Document', text = "Document #" + t)

   });

   $('a.print_button').on('click', function(){
      
      var id               =     $(this).data('id');
      var name             =     $(this).data('name');
      var track            =     $(this).data('track');
      var document_type    =     $(this).data('type');
      var created          =     $(this).data('received');
      var encoded_by       =     $(this).data('encoded-by');
      var destination      =     $(this).data('destination');
      var description      =     $(this).data('description');
      var origin           =     $(this).data('origin');

      $('#print_slip_modal').find('.document_name').text(name);
      $('#print_slip_modal').find('.print_tracking_number').text(track);
      $('#print_slip_modal').find('.document_type').text(document_type);
      $('#print_slip_modal').find('.created').text(created);
      $('#print_slip_modal').find('.encoded_by').text(encoded_by);
      $('#print_slip_modal').find('.type').text(destination);
      $('#print_slip_modal').find('.description').text(description);
      $('#print_slip_modal').find('.origin').text(origin);
      $('#print_slip_modal').modal('show');

     
   });






   function print_slip() {

      var div = document.getElementById("slip").innerHTML;
      var a = window.open('', '');
      a.document.write('<html><title>Routing Slip</title>');

      a.document.write('<body>');
      a.document.write(div);
      a.document.write('</body></html>');
      a.document.close();
      a.print();
   }

   $('a#print_slips').on('click', function(){

      var selected_items = get_select_items_datatable();
      if(selected_items.length  == 0){
         alert('Please Select at least one')
      }else{
         var a = window.open(base_url + '/dts/admin/print-slips/?ids='+selected_items, '__blank');
      }
   });

  



</script>

@endsection