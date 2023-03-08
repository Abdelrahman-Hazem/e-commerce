<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
	dir="{{app()->getLocale() == 'ar' ? 'rtl' : 'ltr'}}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
	<!-- all links -->
	@include('dashboard.includes.links')

</head>
<body>

	<!-- navbar -->
	@include('dashboard.includes.navbar')
	
	<!--/.sidebar-->
	@include('dashboard.includes.sidebar')



<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="{{route('home')}}">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">@yield('page_title')</h1>
			</div>
		</div><!--/.row-->

		
		<!-- main content -->
	@yield('content')

</div>
	
	<!-- all scripts -->
	@include('dashboard.includes.all_scripts')
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>


	<script >
	let myJsonObject = {"username" :"ahmed" , "name" :"mo"};
	let myJsObject = JSON.parse(myJsonObject);
console.log(myJsonObject);
console.log(typeof (myJsonObject));

	</script>	
</body>
</html>