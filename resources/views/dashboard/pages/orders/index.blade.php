@extends('layouts.admin_layout')
@section('title' ,'Admin Panel ')
@section('page_title' , 'Orders')

	@section('content')	
	                	<!-- index -->
	<table class="table">
		<thead>
			<tr>
				<th>image</th>
				<th>product name</th>
				<th>Customer name</th>
				<th>Phone</th>
				<th>Address</th>
                <th>Order Time</th>
                <th>control</th>
			</tr>
		</thead>
     <tbody>
		
	@foreach($orders as $order)
	 <tr>
		<td><img class="img-fluid" width="150" height="200" alt="Image" src="{{asset('images/products/'.$order->image)}}"></td> 
		<td><a href="">{{$order->product_name}}</a></td> 
		<td>{{$order->user_name}}</td>
		<td>{{$order->phone}}</td>
		<td>{{$order->address}}</td>
		<td>{{$order->created_at}}</td>
		 <td> 
                    <!-- Edit button -->
					
			 <a  href="" class="btn btn-primary">{{$order->status}}</a> 
                        
                        <!-- Delete button -->
{{-- <form method="post" action="{{route('products.destroy',['product'=>$product->id])}}">
	@method('delete')
<button type="submit" class="btn btn-danger">Delete</button>
@csrf 
</form> --}}

		</td>
       </tr>
	@endforeach
      </tbody>
	</table>
@endsection
	
	
	
	