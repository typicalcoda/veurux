@extends('dashboard.master')


@section('content')
@section('icon','home')
@section('page-title', 'Dashboard')

<div class="alert alert-blue">
	<i class="fa fa-info"></i>
	<span>
		<strong>Note - </strong>
		This data is for practices that are either complete, or those whose dates have passed.
	</span>
</div>

<canvas id="myChart" width="400" height="100"></canvas>

@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>
	var ctx = "myChart";

	var data = {
		labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October","November","December"],
		datasets: [
		{
			label: "Pickups this year",
			backgroundColor: [
			'rgba(255, 99, 132, 0.2)',
			'rgba(94, 162, 235, 0.2)',
			'rgba(255, 206, 86, 0.2)',
			'rgba(75, 192, 112, 0.2)',
			'rgba(153, 102, 255, 0.2)',
			'rgba(255, 159, 64, 0.2)'
			],
			borderColor: [
			'rgba(255,99,112,1)',
			'rgba(54, 162, 245, 1)',
			'rgba(92, 206, 86, 1)',
			'rgba(15, 112, 192, 1)',
			'rgba(53, 102, 255, 1)',
			'rgba(255, 159, 64, 1)'
			],
			borderWidth: 1,
			data: [65, 59, 80, 81,0,0,0,0,0,0,0,0]
		}
		]
	};

	var myBarChart = new Chart(ctx, {
		type: 'line',
		data: data
	});
</script>

@endsection