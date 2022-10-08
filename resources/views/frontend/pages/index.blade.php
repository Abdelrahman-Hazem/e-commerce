@extends('layouts.app')
  @section('title' , 'Mavi Store')
  @section('content')
 
    <div class="site-blocks-cover" data-aos="fade">
      <div class="container">

        <div class="row align-items-center">
          <div class="col-lg-5 text-center">
            <div class="featured-hero-product w-100">
              <h5 class="mb-2">{{($settings->site_title)}}</h5>
              <h4>{{$settings->title_desc}}</h4>
              <p><a href="{{route('shop.index')}}" class="btn btn-outline-primary rounded-0">Shop Now</a></p>
            </div>  
          </div>
          <div class="col-lg-7 align-self-end text-center text-lg-right">
            <img src="{{asset('assets/web_assets/images/model_5.png')}}" alt="Image" class="img-fluid img-1">
          </div>
          
        </div>
      </div>
      
    </div>

  
   
 
    
  </div>

 @endsection 