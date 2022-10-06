@extends('layouts.admin_layout')
@section('title' ,'Edit Site Setting')
@section('page_title' , 'Site Settings')

@section('content')

<form method="post" action="{{ route('settings.update', ['setting'=>1] ) }}" enctype="multipart/form-data">
@method('PATCH')

  <div class="form-groub">
  <input type="text" name="site_name_en" placeholder="site name en" autofocus="" class="form-control" value="{{ old('site_name_en') ??$Setting->site_name_en}}">
  </div>
<div>{{ $errors->first('site_name_en') }}</div>

  <br>

<div class="form-groub">
  <input type="text" name="site_name_ar" placeholder="site name ar" class="form-control" value="{{old('site_name_ar') ??$Setting->site_name_ar}}">
  </div>
<div>{{ $errors->first('site_name_ar') }}</div>

  <br>

  <div class="form-groub">
  <input type="text" name="site_title_en" placeholder="site title en" class="form-control" value="{{old('site_title_en')??$Setting->site_title_en}}">
  </div>
  
  <div>{{ $errors->first('site_title_en') }}</div>

  <br>
  <div class="form-groub">
    <input type="text" name="site_title_ar" placeholder="site title ar" class="form-control" value="{{old('site_title_ar')??$Setting->site_title_ar}}">
    </div>
    
    <div>{{ $errors->first('site_title_ar') }}</div>
  
    <br>

  <div class="form-groub">
  <input type="text" name="title_desc_en" placeholder="title desc en" class="form-control" value="{{old('title_desc_en')??$Setting->title_desc_en}}">
  </div>
   <div>{{ $errors->first('title_desc_en') }}</div>
  <br>

  <div class="form-groub">
    <input type="text" name="title_desc_ar" placeholder="title desc ar" class="form-control" value="{{old('title_desc_ar')??$Setting->title_desc_ar}}">
    </div>
     <div>{{ $errors->first('title_desc_ar') }}</div>
    <br>

  <div class="form-groub">
  <input type="text" name="about_us_en" placeholder="about us en" class="form-control" value="{{old('about_us_en')??$Setting->about_us_en}}">
  </div>
   <div>{{ $errors->first('about_us_en') }}</div>
  <br>
  
  <div class="form-groub">
    <input type="text" name="about_us_ar" placeholder="about us ar" class="form-control" value="{{old('about_us_ar')??$Setting->about_us_ar}}">
    </div>
     <div>{{ $errors->first('about_us_ar') }}</div>
    <br>

  <div class="form-groub">
  <input type="text" name="address_en" placeholder="address en" class="form-control" value="{{old('address_en')??$Setting->address_en}}">
  </div> 
  <div>{{ $errors->first('address_en') }}</div>
   <br>

   <div class="form-groub">
    <input type="text" name="address_ar" placeholder="address ar" class="form-control" value="{{old('address_ar')??$Setting->address_ar}}">
    </div> 
    <div>{{ $errors->first('address_ar') }}</div>
     <br>

   <div class="form-groub">
    <input type="text" name="phone_en" placeholder="phone en " class="form-control" value="{{old('phone_en')??$Setting->phone_en}}">
    </div> 
    <div>{{ $errors->first('phone_en') }}</div>
     <br>

     <div class="form-groub">
      <input type="text" name="phone_ar" placeholder="phone ar " class="form-control" value="{{old('phone_ar')??$Setting->phone_ar}}">
      </div> 
      <div>{{ $errors->first('phone_ar') }}</div>
       <br>

       <div class="form-groub">
        <input type="email" name="email" placeholder="email " class="form-control" value="{{old('email')??$Setting->email}}">
        </div> 
        <div>{{ $errors->first('email') }}</div>
         <br>
<input type="submit" name="" class="btn btn-primary">

@csrf
</form>


@endsection