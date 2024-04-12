<script>
    document.addEventListener("DOMContentLoaded", function() {
    // Datatables with Buttons
    var datatablesButtons = $("#datatables-buttons").DataTable({
        responsive: true,
        ordering: false,
        lengthMenu: 

        [10, 25, 50, 100, 500, 'All'],

    pageLength: 25,
        

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

</script><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/includes/datatable.blade.php ENDPATH**/ ?>