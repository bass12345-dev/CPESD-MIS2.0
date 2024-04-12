<script>
    document.addEventListener("DOMContentLoaded", function() {
    // Datatables with Buttons
    table = $("#datatable_with_select").DataTable({
        responsive: true,
        ordering: false,
        lengthMenu: 
        [10, 25, 50, 100, 500, 'All'],
         pageLength: 25,

         'columnDefs': [
         {
            'targets': 0,
            'checkboxes': {
               'selectRow': true
            }
         }
      ],

      'select': {
         'style': 'multi'
      },
         
        

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
    table.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)");
});

function get_select_items_datatable(){
    var rows_selected = table.column(0).checkboxes.selected();
      let arr = [];
      $.each(rows_selected, function(index, rowId){
           arr.push(rowId);
      });

     return arr;
}
</script>