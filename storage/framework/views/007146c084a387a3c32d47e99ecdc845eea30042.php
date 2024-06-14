
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <div class="card-actions float-end">
                        <div class="position-relative">
                            <?php echo $__env->make('components.select_year', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                    <h5 class="card-title mb-0">Document Types</h5>
                </div>
                <div class="card-body d-flex w-100">
                    <div class="align-self-center chart chart-lg">
                        <?php echo $__env->make('components.submit_loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <canvas id="chartjs-dashboard-line"></canvas>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>

function load_document_types_analytics(year) {

    $.ajax({
        url: base_url + '/dts/d-t-analytics',
        data: {
            year: year
        },
        method: 'POST',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        beforeSend: function() {
            $('.submit-loader').removeClass('d-none');
        },
        success: function(data) {
            $('.submit-loader').addClass('d-none');
            try {
              
                new Chart(document.getElementById("chartjs-dashboard-line"), {
                    type: 'bar',
                    data: {
                        labels: data.label,
                        datasets: [{
                            label: 'Documents',
                            backgroundColor: "rgb(41,134,204)",
                            borderColor: 'rgb(23, 125, 255)',
                            data: data.count_documents
                        }]
                    },
                    options: {
                        legend: {
                            position: 'top',
                            labels: {
                                padding: 10,
                                fontColor: '#007bff',
                            }
                        },
                        responsive: true,
                        title: {
                            display: true,
                            text: 'Documents in year ' + year
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                    }
                });
            } catch (error) {}
        },
        error: function(xhr, status, error) {},
    })

}

document.addEventListener("DOMContentLoaded", function() {
    var year = $('#admin_year option:selected').val();
	load_document_types_analytics(year)
});

function load_graph($this) {
	load_document_types_analytics($this.value)
}

// 	document.addEventListener("DOMContentLoaded", function() {
// 	var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");

// 	// Line chart
// 	new Chart(document.getElementById("chartjs-dashboard-line"), {
// 		type: "bar",
// 		data: {
// 			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
// 			datasets: [{
// 				label: "Sales ($)",
// 				fill: true,
// 				backgroundColor: 'red',
// 				borderColor: window.theme.primary,
// 				data: [
// 					2115,
// 					1562,
// 					1584,
// 					1892,
// 					1587,
// 					1923,
// 					2566,
// 					2448,
// 					2805,
// 					3438,
// 					2917,
// 					3327
// 				]
// 			}]
// 		},
// 		options: {
// 			maintainAspectRatio: false,
// 			legend: {
// 				display: false
// 			},
// 			tooltips: {
// 				intersect: false
// 			},
// 			hover: {
// 				intersect: true
// 			},
// 			plugins: {
// 				filler: {
// 					propagate: false
// 				}
// 			},
// 			scales: {
// 				xAxes: [{
// 					reverse: true,
// 					gridLines: {
// 						color: "rgba(0,0,0,0.0)"
// 					}
// 				}],
// 				yAxes: [{
// 					ticks: {
// 						stepSize: 1000
// 					},
// 					display: true,
// 					borderDash: [3, 3],
// 					gridLines: {
// 						color: "rgba(0,0,0,0.0)",
// 						fontColor: "#fff"
// 					}
// 				}]
// 			}
// 		}
// 	});
// });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dts.admin.layout.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS2.0\resources\views/dts/admin/contents/analytics/analytics.blade.php ENDPATH**/ ?>