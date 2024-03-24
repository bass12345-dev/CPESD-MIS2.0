
<script>
    
    $('a#view_remarks').on('click', function() {
        $('#staticBackdrop').modal('show');
        $('.remarks').text($(this).data('remarks'));
    });
    $('input[name=check_all]').on('change', function() {

        var check = $('input[name=check_all]:checked').val();
        if (check == 'true') {
            $('input[name=document_id]').prop('checked', true);
        } else {
            $('input[name=document_id]').prop('checked', false);
        }
    });

    function get_receiver_incoming() {

        $.ajax({
            url: base_url + '/dts/us/g-r-i',
            method: 'GET',
            dataType: 'text',

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            success: function(data) {

                if (data) {
                    $('span.to_receive').text(data)
                }

            },
            error: function() {
                alert('something Wrong');

            }

        });

    }


    

    // A $( document ).ready() block.
    $(document).ready(function() {
        get_receiver_incoming();
    });
</script><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/global_includes/js_/dts_script.blade.php ENDPATH**/ ?>