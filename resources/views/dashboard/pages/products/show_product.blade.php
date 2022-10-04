@extends('layouts.admin_layout')
@section('title' ,'Admin Panel ')

	 @section('content')	
	
		<div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="border">
              <img width="400" height="600" src="{{asset('images/products/'.$product->image)}}" alt="Image" class="img-fluid">
            </div>
          </div>
          <div class="col-md-6">
            <h2 class="text-black">{{$product->name}}</h2>
            <p>Description : {{$product->description}}</p>
            <p>stock : {{$product->stock}}</p>
            <p>Serial Number : {{$product->serial_number}}</p>
            <!-- <p >Ex numquam veritatis debitis minima quo error quam eos dolorum quidem perferendis. Quos repellat dignissimos minus, eveniet nam voluptatibus molestias omnis reiciendis perspiciatis illum hic magni iste, velit aperiam quis.</p> -->
            <p><strong class="text-primary h4">${{$product->price}}</strong></p>


            <a href="{{route('products.edit' , ['product'=>$product->id])}}" class="btn btn-primary" >Edit</a>
          </div>
         
        </div>
      </div>
    </div>
		

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
	