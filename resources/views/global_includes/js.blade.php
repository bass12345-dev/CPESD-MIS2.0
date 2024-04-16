@include('global_includes.modals.update_password_strong1')
@include('global_includes.modals.view_remarks')


<script type="text/javascript">
var base_url = '<?php echo url('/'); ?>';
var table;
</script>
<script src=" {{ asset('assets/js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.all.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.20.0/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://pagination.js.org/dist/2.6.0/pagination.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-loading-overlay@1.1.0/dist/js-loading-overlay.min.js"></script>


<script src=" {{ asset('assets/js/datatables.js') }}"></script>
<script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>



<!-- DATATABLE -->
<!-- <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.3/af-2.7.0/b-3.0.1/b-colvis-3.0.1/b-html5-3.0.1/b-print-3.0.1/cr-2.0.0/date-1.5.2/fc-5.0.0/fh-4.0.1/kt-2.12.0/r-3.0.1/rg-1.5.0/rr-1.5.0/sc-2.4.1/sb-1.7.0/sp-2.3.0/sl-2.0.0/sr-1.4.0/datatables.min.js"></script>
<script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/select/2.0.0/js/dataTables.select.js"></script>
<script src="https://cdn.datatables.net/select/2.0.0/js/select.dataTables.js"></script> -->

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
            // location.reload();
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

                       
                         table.ajax.reload();

                    } else {

                        alert(data.message)
                        setTimeout(reload_page, 2000)

                    }
                    
                },
                error: function() {
                    alert('something Wrong');
                    // location.reload();
                    JsLoadingOverlay.hide();

                }

            });
        }
    });

}

function get_selected_items(){
   let items = [];
   $('input[name=document_id]:checked').map(function(item){items.push($(this).val());});
   return items;

   }

</script>