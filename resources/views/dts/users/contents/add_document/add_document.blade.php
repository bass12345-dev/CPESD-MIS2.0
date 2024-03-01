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

@endsection
@section('js')
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
            add_document(form, url);


         }
      });


   });

   function add_document(form,url) {
      Swal.showLoading();
      $.ajax({
         url: base_url + url,
         method: 'POST',
         data: form,
         dataType: 'json',
 
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
         },
         success: function(data) {
            Swal.close();
            var id = data.id;
            if (data.response) {


               Swal.fire({
                  title: "Print Routing Slip",
                  text: "",
                  icon: "success",
                  showCancelButton: true,
                  confirmButtonColor: "#3085d6",
                  cancelButtonColor: "#d33",
                  confirmButtonText: "print"
               }).then((result) => {
                  if (result.isConfirmed) {
         
                     window.location.href = base_url + '/dts/user/print-slip?id=' + id
                  }else {
                     window.location.reload();
                  }

               

               });

            } else {

               alert(data.message)

            }

           
         },
         error: function() {
            alert('something Wrong');
            setTimeout(reload_page, 2000)
         }

      });
   }
</script>
@endsection