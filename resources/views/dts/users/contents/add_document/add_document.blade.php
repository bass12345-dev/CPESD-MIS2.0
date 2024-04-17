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
<script type="text/javascript">

document.addEventListener("DOMContentLoaded", function () {
   table = $("#datatables-buttons").DataTable({
      responsive: true,
      ordering: false,
      processing: true,
      pageLength: 25,
      language: {
         "processing": '<div class="d-flex justify-content-center "> <img class="top-logo mt-4" src="{{asset("assets/img/peso_logo.png")}}"></div>'
      },
      
      
      ajax: {
         url: base_url + "/dts/us/g-l-d",
         method: 'GET',
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
         },
         dataSrc: ""
      },
      columns: [
         {
         data: 'number',
      }, 
      {
         data: null,
      }, 
      {
         data: 'name',
      }, 
      {
         data: 'document_number',
      }, 
   ],
      columnDefs: [ 
            {
               targets: 1,
               data: null,
               render: function (data, type, row) {
                  return '<a href="' + base_url + '/dts/user/view?tn=' + row.document_number + '" data-toggle="tooltip" data-placement="top" title="View ' + row.document_number + ' ?>">' + row.document_name + '</a>';
               }
            },

           

   ]

   });
});


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
            add_item(form, url);
            $('#add_document').find('button').attr('disabled', false);
            $('#add_document')[0].reset();
            tracking_number();

         }
      });


   });


   function tracking_number(){
      var url = '/dts/us/g-t-n';
      $.ajax({
        url: base_url + url,
        method: 'GET',
        dataType: 'text',
        beforeSend : function(){
            loader();
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        success: function(data) {
            JsLoadingOverlay.hide();
            if (data) {
                $('input[name=tracking_number]').val(data);
            } else {
               alert('Failed to load Tracking Number Please Contact the Develope');
                setTimeout(reload_page, 2000)
            } 
        },
        error: function() {
            alert('Failed to load Tracking Number Please Contact the Developer');
            location.reload();
            JsLoadingOverlay.hide();
        }

    });
      
   }

   $(document).ready(function(){
      tracking_number();
   })


</script>
@endsection