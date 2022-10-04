@extends('layouts.admin_layout')
@section('title' ,'Edit Admin')

@section('content')

<form method="post" action="{{ route('admins.update', ['admin'=>$admin->id] ) }}" enctype="multipart/form-data">
@method('PATCH')

  <div class="form-groub">
  <input type="text" name="name" placeholder="name" autofocus="" class="form-control" value="{{ old('name') ??$admin->name}}">
  </div>
<div>{{ $errors->first('name') }}</div>

  <br>

<div class="form-groub">
  <input type="email" name="email" placeholder="email" class="form-control" value="{{old('email') ??$admin->email}}">
  </div>
<div>{{ $errors->first('email') }}</div>

  <br>

  <div class="form-groub">
  <input type="password" name="password" placeholder="password" class="form-control" value="{{old('password')??$admin->password}}">
  </div>
  
  <div>{{ $errors->first('password') }}</div>

  <br>

  <div class="form-groub">
  <input type="file" name="image" placeholder="image" class="form-control" value="{{old('image')??$admin->image}}">
  </div>
   <div>{{ $errors->first('image') }}</div>

  <br>
  
  <div class="form-groub">
  <input type="number" name="phone" placeholder="phone" class="form-control" value="{{old('phone')??$admin->phone}}">
  </div>
   <div>{{ $errors->first('phone') }}</div>

  <br>
  
  <div class="form-groub">
  <input type="text" name="address" placeholder="address" class="form-control" value="{{old('address')??$admin->address}}">
  </div>
   
  

<input type="submit" name="" class="btn btn-primary">

@csrf
</form>


@endsection