@extends('layouts.app')
  
  @section('content')
  <div class="site-wrap">
    

   

    <div class="site-blocks-cover" data-aos="fade">
      <div class="container">

        <div class="row align-items-center">
          <div class="col-lg-5 text-center">
            <div class="featured-hero-product w-100">
              <h1 class="mb-2">Madewell</h1>
              <h4>Summer Collection</h4>
              <div class="price mt-3 mb-5"><strong>1,499</strong> <del>$1,999</del></div>
              <p><a href="#" class="btn btn-outline-primary rounded-0">Shop Now</a> <a href="#" class="btn btn-primary rounded-0">Shop Now</a></p>
            </div>  
          </div>
          <div class="col-lg-7 align-self-end text-center text-lg-right">
            <img src="{{asset('assets/web_assets/images/model_5.png')}}" alt="Image" class="img-fluid img-1">
          </div>
          
        </div>
      </div>
      
    </div>

  
    <div class="products-wrap border-top-0">
      <div class="container-fluid">
        <div class="row no-gutters products">

            @foreach ($products as $product)
            <div class="col-6 col-md-6 col-lg-4">
                <a href="#" class="item">
                  <img src="{{asset('assets/web_assets/images/product_1.jpg')}}" alt="Image" class="img-fluid">
                  <div class="item-info">
                    <h3>The Shoe</h3>
                    <span class="collection d-block">Summer Collection</span>
                    <strong class="price">$9.50</strong>
                  </div>
                </a>
              </div>
            @endforeach
        </div>
      </div>
    </div>
   <div class="">
    {{$products->links()}}
   </div>     

    
  </div>

 @endsection 