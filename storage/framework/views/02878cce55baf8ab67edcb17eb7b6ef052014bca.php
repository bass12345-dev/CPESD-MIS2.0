<?php echo $__env->make('global_includes.modals.update_password_strong1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('global_includes.modals.view_remarks', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<script type="text/javascript">
var base_url = '<?php echo url('/'); ?>';
</script>
<script src=" <?php echo e(asset('assets/js/app.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"
    integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src=" <?php echo e(asset('assets/js/datatables.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.20.0/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://pagination.js.org/dist/2.6.0/pagination.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-loading-overlay@1.1.0/dist/js-loading-overlay.min.js"></script>
<script>
function reload_page() {
    location.reload();
}

function loader(){

    JsLoadingOverlay.show({
	'overlayBackgroundColor': '#666666',
	'overlayOpacity': 0.6,
	'spinnerIcon': 'square-loader',
	'spinnerColor': '#000',
	'spinnerSize': '3x',
	'overlayIDName': 'overlay',
	'spinnerIDName': 'spinner',
	'offsetY': 0,
	'offsetX': 0,
	'lockScroll': false,
	'containerID': null,
	'spinnerZIndex':99999,
	'overlayZIndex':99998
});

}



//$(document).ready(function() {
    //$('#strong_pass_modal').modal('show')
//});

$(document).on('click','span.show_con', function(){
   var input = $('input.password');
   var show_eye = $('i.show_icon');
   var hide_eye = $('i.hidden_icon');
   show_icon(input,show_eye,hide_eye)
});

$(document).on('click', 'span.show_con1', function() {
        var input = $('input.password1');
        var show_eye = $('i.show_icon1');
        var hide_eye = $('i.hidden_icon1');
        show_icon(input, show_eye, hide_eye)
    });

    $(document).on('click', 'span.show_con2', function() {
        var input = $('input.password2');
        var show_eye = $('i.show_icon2');
        var hide_eye = $('i.hidden_icon2');
        show_icon(input, show_eye, hide_eye)
    });
  

function show_icon(input,show_eye,hide_eye){
   if(input.attr('type') === 'password'){
      input.prop('type','text');
      show_eye.attr('hidden',true)
      hide_eye.removeAttr('hidden')
   }else {
      input.prop('type','password');
      hide_eye.attr('hidden',true)
      show_eye.removeAttr('hidden')
   }

}


$('form#update_password_strong').on('submit', function(e){
    e.preventDefault();
    Swal.showLoading();
    var url = '/up-pas';    
    $.ajax({
        url: base_url + url,
        method: 'POST',
        data: $(this).serialize(),
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        success: function(data) {
            Swal.close();
            if (data.response) {

                
                // Swal.fire({
                //     position: "top-end",
                //     icon: "success",
                //     title: data.message,
                //     showConfirmButton: false,
                //     timer: 1500
                // });

            } else {

                alert(data.message)

            }

            setTimeout(reload_page, 2000)
        },
        error: function() {
            alert('something Wrong');
            
        }

    });
    
});



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




function highlightText(query){
    

    const searchValue = query.trim();
    const contentElement = document.querySelector('.data-container');

    
    if (searchValue !== '') {
         const content = contentElement.innerHTML;
         const highlightedContent = content.replace(
            new RegExp(searchValue, 'gi'),
            '<span class="highlight">$&</span>'
         );
         contentElement.innerHTML = highlightedContent;
        
        
         } else {
            contentElement.innerHTML = contentElement.textContent;
           
            
         }

  }





function add_item(data, url) {

    $.ajax({
        url: base_url + url,
        method: 'POST',
        data: data,
        dataType: 'json',
        beforeSend : function(){
            loader();
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        success: function(data) {
            JsLoadingOverlay.hide();
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
            location.reload();
            JsLoadingOverlay.hide();
        }

    });

}


function update_item(id, data, url) {

    $.ajax({
        url: base_url + url,
        method: 'POST',
        data: data,
        dataType: 'json',
        beforeSend : function(){
            loader();
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        success: function(data) {
            JsLoadingOverlay.hide();
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
            location.reload();
            JsLoadingOverlay.hide();

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
                beforeSend : function(){
                    loader();
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                success: function(data) {
                     JsLoadingOverlay.hide();
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
                    location.reload();
                    JsLoadingOverlay.hide();

                }

            });
        }
    });

}
</script><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/global_includes/js.blade.php ENDPATH**/ ?>