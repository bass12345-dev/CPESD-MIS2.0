@extends('dts.users.layout.user_master')
@section('title', $title)
@section('content')
@include('global_includes.title')
<div class="row">
   <div class="col-12  col-md-7 ">
      @include('dts.users.contents.add_document.sections.document_table')
   </div>
   <div class="col-12 col-md-5">
      @include('dts.users.contents.add_document.sections.form')
   </div>
</div>
@include('dts.users.contents.my_documents.modals.print_modal')
@endsection
@section('js')
@include('dts.includes.datatable')
<script type="text/javascript">
   $('#add_document').on('submit', function(e) {
      e.preventDefault();
      var url = '/dts/us/add-d';
      var form = $(this).serialize();


      Swal.fire({
         title: "Review First Before Submitting",
         text: "",
         icon: "warning",
         showCancelButton: true,
         confirmButtonColor: "#3085d6",
         cancelButtonColor: "#d33",
         confirmButtonText: "Submit"
      }).then((result) => {
         if (result.isConfirmed) {
            //add_item(form,url);
            $('#add_document').find('button').attr('disabled', true);
            add_item(form, url)

         }
      });


   });


</script>
@endsection