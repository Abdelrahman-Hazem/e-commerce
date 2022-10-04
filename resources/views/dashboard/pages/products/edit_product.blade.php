@extends('layouts.admin_layout')
@section('title' ,'Create Products')

@section('content')
<form method="post" enctype="multipart/form-data" action="{{route('products.update' ,['product' =>$product->id])}}" >
  @method('PATCH')
	<div class="form-groub">
  <input type="text" name="name" placeholder="name" class="form-control" value="{{ old('name')??$product->name}}">
  </div>
<div>{{ $errors->first('name') }}</div>
  <br>

 <div class="form-groub">
  <input type="number" name="price" placeholder="price" class="form-control" value="{{ old('price') ??$product->price}}">
  </div>
<div>{{ $errors->first('price') }}</div>
  <br>

  <div class="form-groub">
  <input type="file" name="image" placeholder="image" class="form-control" value="{{ old('image'??$product->image)}}">
  </div>
<div>{{ $errors->first('image') }}</div>
  <br>

  <div class="form-groub">
  <input type="text" name="serial_number" placeholder="serial number" class="form-control" value="{{ old('serial_number')??$product->serial_number}}">
  </div>
<div>{{ $errors->first('serial_number') }}</div>
  <br>

  <div class="form-groub">
  <input type="text" name="stock" placeholder="stock" class="form-control" value="{{ old('stock')??$product->stock}}">
  </div>
<div>{{ $errors->first('stock') }}</div>
  <br>
  
  <div class="form-groub">
  <select class="form-control" name="category_id" value="{{ old('category_id')??$product->category_id}}" >
  	<option selected disabled="" >Category</option>
   @foreach($categories as $category)
           <option value="{{$category->id}}" >{{$category->name_en}}</option>
          @endforeach
  </select> 
  </div>
<div>{{ $errors->first('category_id') }}</div>
  <br>
  
  <div class="form-groub">
  <input type="text" name="description" placeholder="description" class="form-control" value="{{ old('description')??$product->description}}">
  </div>
<div>{{ $errors->first('description') }}</div>
  <br>
  
  <input type="submit" class="btn btn-primary">
  
 @csrf 
</form>

@endsection