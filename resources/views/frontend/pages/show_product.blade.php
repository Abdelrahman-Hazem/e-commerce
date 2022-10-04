@extends('layouts.app')
  @section('title' , $product->name)
  @section('content')

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="border">
              <img src="{{asset('storage/'.$product->image)}}" alt="Image" class="img-fluid">
            </div>
          </div>
          <div class="col-md-6">
            <h2 class="text-black">{{$product->name}}</h2>
            <p>{{$product->description}}</p>
            <!-- <p >Ex numquam veritatis debitis minima quo error quam eos dolorum quidem perferendis. Quos repellat dignissimos minus, eveniet nam voluptatibus molestias omnis reiciendis perspiciatis illum hic magni iste, velit aperiam quis.</p> -->
            <p><strong class="text-primary h4">${{$product->price}}</strong></p>

<form method="post" action="{{route('orders.store')}}" >


<input type="hidden" name="user_id" value="{{Auth::user()->id}}">

<input type="hidden" name="product_id" value="{{$product->id}}">

            <div class="mb-1 d-flex">
              <label for="option-sm" class="d-flex mr-3 mb-3">
                <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-sm" value="1" name="size"></span> <span class="d-inline-block text-black">Small</span>
              </label>
              <label for="option-md" class="d-flex mr-3 mb-3">
                <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-md" name="size" value="2"></span> <span class="d-inline-block text-black">Medium</span>
              </label>
              <label for="option-lg" class="d-flex mr-3 mb-3">
                <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-lg" name="size" value="3"></span> <span class="d-inline-block text-black">Large</span>
              </label>
              <label for="option-xl" class="d-flex mr-3 mb-3">
                <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-xl" name="size" value="4"></span> <span class="d-inline-block text-black"> Extra Large</span>
              </label>
            </div>
            <div class="mb-5">
              <div class="input-group mb-3" style="max-width: 120px;">
              <div class="input-group-prepend">
                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
              </div>
              <input name="amount" type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
              <div class="input-group-append">
                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
              </div>
            </div>

            </div>
            <p><input type="submit" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary" value="Add To Cart"></p>
          </div>
    @csrf      
 </form>         
        </div>
      </div>
    </div>

    <!-- <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="title-section text-center col-12">
            <h2 class="text-uppercase">More Products</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 block-3 products-wrap">
            <div class="nonloop-block-3 owl-carousel">
              
              <div class="product">
                <a href="shop-single.html" class="item">
                  <img src="images/product_1.jpg" alt="Image" class="img-fluid">
                  <div class="item-info">
                    <h3>The Shoe</h3>
                    <span class="collection d-block">Summer Collection</span>
                    <strong class="price">$9.50</strong>
                  </div>
                </a>
              </div>

              <div class="product">
                <a href="shop-single.html" class="item">
                  <span class="tag">Sale</span>
                  <img src="images/product_2.jpg" alt="Image" class="img-fluid">
                  <div class="item-info">
                    <h3>Marc Jacobs Bag</h3>
                    <span class="collection d-block">Summer Collection</span>
                    <strong class="price">$9.50 <del>$30.00</del></strong>
                  </div>
                </a>
              </div>

              <div class="product">
                <a href="shop-single.html" class="item">
                  <img src="images/product_3.jpg" alt="Image" class="img-fluid">
                  <div class="item-info">
                    <h3>The  Belt</h3>
                    <span class="collection d-block">Summer Collection</span>
                    <strong class="price">$9.50</strong>
                  </div>
                </a>
              </div>

              <div class="product">
                <a href="shop-single.html" class="item">
                  <img src="images/product_1.jpg" alt="Image" class="img-fluid">
                  <div class="item-info">
                    <h3>The Shoe</h3>
                    <span class="collection d-block">Summer Collection</span>
                    <strong class="price">$9.50</strong>
                  </div>
                </a>
              </div>

              <div class="product">
                <a href="shop-single.html" class="item">
                  <span class="tag">Sale</span>
                  <img src="images/product_2.jpg" alt="Image" class="img-fluid">
                  <div class="item-info">
                    <h3>Marc Jacobs Bag</h3>
                    <span class="collection d-block">Summer Collection</span>
                    <strong class="price">$9.50 <del>$30.00</del></strong>
                  </div>
                </a>
              </div>

              <div class="product">
                <a href="shop-single.html" class="item">
                  <img src="images/product_3.jpg" alt="Image" class="img-fluid">
                  <div class="item-info">
                    <h3>The  Belt</h3>
                    <span class="collection d-block">Summer Collection</span>
                    <strong class="price">$9.50</strong>
                  </div>
                </a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div> -->
@endsection