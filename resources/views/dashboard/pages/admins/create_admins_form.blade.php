@extends('layouts.admin_layout')
@section('title' ,'create admin')

@section('content')

<form method="post" action="{{ route('admins.store')}}" enctype="multipart/form-data">

	<div class="form-groub">
  <input type="text" name="name" placeholder="name" autofocus="" class="form-control" value="{{ old('name')}}">
  </div>
<div>{{ $errors->first('name') }}</div>

  <br>

<div class="form-groub">
  <input type="email" name="email" placeholder="email" class="form-control" value="{{old('email')}}">
  </div>
<div>{{ $errors->first('email') }}</div>

 <br>

  <div class="form-groub">
  <input type="password" name="password" placeholder="password" class="form-control" value="{{old('password')}}">
  </div>
  
  <div>{{ $errors->first('password') }}</div>

  <br>

  <div class="form-groub">
  <input type="file" name="image" placeholder="image" class="form-control" value="{{old('image')}}">
  </div>
   <div>{{ $errors->first('image') }}</div>

  <br>
  
  <div class="form-groub">
  <input type="number" name="phone" placeholder="phone" class="form-control" value="{{old('phone')}}">
  </div>
   <div>{{ $errors->first('phone') }}</div>

 <br>
  
  <div class="form-groub">
  <input type="text" name="address" placeholder="address" class="form-control" value="{{old('address')}}">
  </div>
   <div>{{ $errors->first('address') }}</div>

  <br>
  

<input type="submit" name="" class="btn btn-primary">

@csrf
</form>


@endsection