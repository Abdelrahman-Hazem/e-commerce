@extends('layouts.admin_layout')
@section('title' ,'Admin Panel ')

	@section('content')	
	                	<!-- index -->
	<table class="table">
		<thead>
			<tr>
				<th>image</th>
				<th>name</th>
				<th>price</th>
				<th>serial_number</th>
				<th>stock</th>
                <th>category_id</th>
                <th>rate</th>
                <th>description</th>
                <th>control</th>
			</tr>
		</thead>
     <tbody>
	@foreach($products as $product)
	 <tr>
		<td><img class="img-fluid" width="150" height="200" alt="Image" src="{{asset('images/products/'.$product->image)}}"></td>
		<td><a href="{{route('products.show' , ['product'=>$product->id])}}">{{$product->name}}</a></td>
		<td>{{$product->price}}</td>
		<td>{{$product->serial_number}}</td>
		<td>{{$product->stock}}</td>
		<td>{{$product->category_id}}</td>
		<td>{{$product->rate}}</td>
		<td>{{$product->description}}</td>
		<td> 
                    <!-- Edit button -->
			<a  href="{{route('products.edit' ,['product'=>$product->id])}}" class="btn btn-primary">edit</a>
                        
                        <!-- Delete button -->
<form method="post" action="{{route('products.destroy',['product'=>$product->id])}}">
	@method('delete')
<button type="submit" class="btn btn-danger">Delete</button>
@csrf 
</form>

		</td>
       </tr>
	@endforeach
      </tbody>
	</table>


<a href="{{route('products.create')}}" class="btn btn-primary">
	Add Product
</a>






	
@endsection<!-- 
	
	
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
	