@extends('watchlisted.admin.layout.watchlisted_master')
@section('title', $title)
@section('content')
@include('global_includes.title')
@include('watchlisted.admin.contents.dashboard.sections.count')
@include('watchlisted.admin.contents.dashboard.sections.barangay')
@endsection
@section('js')
<script type="text/javascript">

		function load_chart(){
			   $.ajax({
			      url: base_url + '/wl/data-per-barangay',
			      method: 'GET',
			      dataType: 'json',
			      success: function (data) {
			      	
			      	try{

			      		// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: "bar",
				data: {
					labels: data.label,
					datasets: [
						{
						label: 'Active',
						backgroundColor: window.theme.danger,
						borderColor: window.theme.danger,
						hoverBackgroundColor: window.theme.danger,
						hoverBorderColor: window.theme.danger,
						data: data.active,
						barPercentage: .75,
						categoryPercentage: .5
					},

					{
						label: 'To Approved',
						backgroundColor: window.theme.warning,
						borderColor: window.theme.warning,
						hoverBackgroundColor: window.theme.warning,
						hoverBorderColor: window.theme.warning,
						data: data.to_approved,
						barPercentage: .75,
						categoryPercentage: .5
					},

					{
						label: 'Removed',
						backgroundColor: window.theme.success,
						borderColor: window.theme.success,
						hoverBackgroundColor: window.theme.success,
						hoverBorderColor: window.theme.success,
						data: data.removed,
						barPercentage: .75,
						categoryPercentage: .5
					}
					

				]
				},
				options: {
					maintainAspectRatio: true,
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
                     text: 'Per Barangay Data'
                  },
					scales: {
						yAxes: [{
							gridLines: {
								display: true
							},
							stacked: false,
							ticks: {
								stepSize: 20
							},
							beginAtZero: true
						}],
						xAxes: [{
							stacked: true,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});

			      	} catch(error){
			      		alert('Something Wrong')
			      	}
			      },
			      error: function (xhr, status, error) {},
			   });

}




	document.addEventListener("DOMContentLoaded", function() {
			load_chart();
		});
</script>

@endsection