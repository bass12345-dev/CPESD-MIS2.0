<select class="custom-select form-select" id="admin_year" onchange="load_graph(this)">
    <?php for ($i = 2023; $i <= 2030; $i++) {

                                    $selected = $i == date('Y') ? "selected" : "";

                                    echo '<option ' . $selected . '>' . $i . '</option>';

                                } ?>
</select><?php /**PATH C:\Apache24\htdocs\CPESD-MIS2.0\resources\views/components/select_year.blade.php ENDPATH**/ ?>