<script>
    $('input[name=check_all]').on('change', function() {

        var check = $('input[name=check_all]:checked').val();
        if (check == 'true') {
            $('input[name=person_id]').prop('checked', true);
        } else {
            $('input[name=person_id]').prop('checked', false);
        }
    });

    function get_selected_items() {

        let items = [];
        $('input[name=person_id]:checked').map(function(item) {
            items.push($(this).val());
        });
        return items;

    }
</script>