@include('global_includes.modals.view_remarks')

<script type="text/javascript">
   var base_url = '<?php echo url('/'); ?>';
</script>
<script src=" {{ asset('assets/js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src=" {{ asset('assets/js/datatables.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.20.0/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script>
   function reload_page() {
      location.reload();
   }

  
   document.addEventListener("DOMContentLoaded", function() {
      // Datatables with Buttons
      var datatablesButtons = $("#datatables-buttons").DataTable({
         responsive: true,
         ordering: false,


         buttons: [{
               extend: 'print',
               title: 'All Documents'
            },
            {
               extend: 'csv',
            }

         ],
         // scrollX: true
      });
      datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)");
   });





   function add_item(data, url) {
      Swal.showLoading();
      $.ajax({
         url: base_url + url,
         method: 'POST',
         data: data,
         dataType: 'json',
         beforeSend: function() {


         },
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
         },
         success: function(data) {
            Swal.close();
            if (data.response) {

               Swal.fire({
                  position: "top-end",
                  icon: "success",
                  title: data.message,
                  showConfirmButton: false,
                  timer: 1500
               });

            } else {

               alert(data.message)

            }

            setTimeout(reload_page, 2000)
         },
         error: function() {
            alert('something Wrong');
            // location.reload();
         }

      });

   }


   function update_item(id, data, url) {

      $.ajax({
         url: base_url + url,
         method: 'POST',
         data: data,
         dataType: 'json',
         beforeSend: function() {
            Swal.showLoading()
         },
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
         },
         success: function(data) {
            Swal.close();
            if (data.response) {

               Swal.fire({
                  position: "top-end",
                  icon: "success",
                  title: data.message,
                  showConfirmButton: false,
                  timer: 1500
               });

            } else {

               alert(data.message)

            }

            setTimeout(reload_page, 2000)
         },
         error: function() {
            alert('something Wrong');

         }

      });

   }

   function delete_item(id, url, button_text = '', text = '') {

      Swal.fire({
         title: "Are you sure?",
         text: text != '' ? text : "",
         icon: "warning",
         showCancelButton: true,
         confirmButtonColor: "#3085d6",
         cancelButtonColor: "#d33",
         confirmButtonText: button_text != '' ? button_text : "Yes, delete it!",
      }).then((result) => {
         if (result.isConfirmed) {

            $.ajax({
               method: 'POST',
               url: base_url + url,
               data: {
                  id: id
               },
               dataType: 'json',
               beforeSend: function() {
                  Swal.showLoading()
               },
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
               },
               success: function(data) {
                  Swal.close();
                  if (data.response) {

                     Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: data.message,
                        showConfirmButton: false,
                        timer: 1500
                     });


                  } else {

                     alert(data.message)

                  }

                  setTimeout(reload_page, 2000)
               },
               error: function() {
                  alert('something Wrong');

               }

            });
         }
      });

   }


</script>