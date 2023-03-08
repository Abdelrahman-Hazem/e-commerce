@extends('layouts.admin_layout')
@section('title' ,'Admin Panel ')
@section('page_title' , 'Admins')

	@section('content')	
	                	<!-- index -->
	<table class="table">
		<thead>
			<tr>
				<th>image</th>
				<th> name</th>
				<th> Role</th>
				<th>Phone</th>
				<th>Address</th>
                <th>control</th>
			</tr>
		</thead>
     <tbody>
		
	@foreach($admins as $admin)
	 <tr>
		<td><img class="img-fluid" width="100" height="150" alt="Image" src="{{asset('images/admins/'.$admin->image)}}"></td> 
		<td><a href="">{{$admin->name}}</a></td> 
		<td>{{$admin->role->name}}</td>
		<td>{{$admin->phone}}</td>
		<td>{{$admin->address}}</td>
		 <td> 
                    <!-- Edit button -->
					
			 <a  href="{{route('admins.edit',['admin'=>$admin->id])}}" class="btn btn-primary">edit</a> 
                        
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
	
	
	
	