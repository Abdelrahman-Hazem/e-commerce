@extends('layouts.admin_layout')
@section('title' ,'Admin Panel ')

	{{-- @section('content')	
	
	
		

	                	<!-- index -->
	<table class="table">
		<thead>
			<tr>
				<th>image</th>
				<th>name</th>
				<th>email</th>
				<th>phone</th>
				<th>address</th>
                <th>control</th>
			</tr>
		</thead>
     <tbody>
	@foreach($admins as $admin)
	 <tr>
		<td><img class="img-fluid" alt="Image" src="{{asset('storage/'.$admin->image)}}"></td>
		<td><a href="{{route('admins.show' , ['admin'=>$admin->id])}}">{{$admin->name}}</a></td>
		<td>{{$admin->email}}</td>
		<td>{{$admin->phone}}</td>
		<td>{{$admin->address}}</td>
		<td> 
                    <!-- Edit button -->
			<a  href="{{route('admins.edit' ,['admin'=>$admin->id])}}" class="btn btn-primary">edit</a>
                        
                        <!-- Delete button -->
<form method="post" action="{{route('admins.destroy',['admin'=>$admin->id])}}">
	@method('delete')
<button type="submit" class="btn btn-danger">Delete</button>
@csrf 
</form>

		</td>
       </tr>
	@endforeach
      </tbody>
	</table>


<a href="{{route('admins.create')}}" class="btn btn-primary">
	Add Admin
</a>






	
@endsection<!-- 
	 --}}
	
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
 -->

	<script >
	let myJsonObject = {"username" :"ahmed" , "name" :"mo"};
	let myJsObject = JSON.parse(myJsonObject);
console.log(myJsonObject);
console.log(typeof (myJsonObject));

	</script>
	