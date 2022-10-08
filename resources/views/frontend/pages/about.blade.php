@extends('layouts.app')
  @section('title' , 'about Mavi Store')
  @section('content')
  <div class="site-wrap">
    

   
    <div class="site-blocks-cover inner-page" data-aos="fade">
      <div class="container">

        <div class="row align-items-center">
          <div class="col-lg-5 text-left">
            <div class="featured-hero-product w-100 text-left">
              <h1 class="mb-2">{{__('frontend.about')}}</h1>
              <p>{{$settings->about_us}}</p>
            </div>  
          </div>
         
          
        </div>
      </div>
      
    </div>



   

    

   
    @endsection