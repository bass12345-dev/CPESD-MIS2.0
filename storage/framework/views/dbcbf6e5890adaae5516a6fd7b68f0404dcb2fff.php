<div class="row">
    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
        <div class="card flex-fill w-100">
            <div class="card-header">
                <div class="card-actions float-end">
                    <div class="position-relative">
                        <?php echo $__env->make('components.select_year', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-6">
                <h5 class="card-title mb-0">Document Types</h5>
                    <div class="card-body d-flex w-100">
                        <div class="align-self-center chart chart-lg">
                            <?php echo $__env->make('components.submit_loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <canvas id="chartjs-dashboard-line" height="400"></canvas>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                <h5 class="card-title mb-0">Documents Per Month</h5>
                    <div class="card-body d-flex w-100">
                        <div class="align-self-center chart chart-lg">
                            <?php echo $__env->make('components.submit_loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <canvas id="chartjs-dashboard-line1" height="400"></canvas>
                        </div>
                    </div>

                </div>
                
            </div>

        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\CPESD-MIS2.0\resources\views/dts/admin/contents/analytics/sections/document_types_analytics.blade.php ENDPATH**/ ?>