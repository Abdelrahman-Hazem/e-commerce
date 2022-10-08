@extends('layouts.app')
  @section('title' ,' My Cart')
  @section('content')
  


    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">{{__('frontend.image')}}</th>
                    <th class="product-name">{{__('frontend.product')}}</th>
                    <th class="product-price">{{__('frontend.price')}}</th>
                    <th class="product-quantity">{{__('frontend.quantity')}}</th>
                    <th class="product-total">{{__('frontend.total')}}</th>
                    <th class="product-remove">{{__('frontend.remove')}}</th>
                  </tr>
                </thead>
                <tbody>
              @if (isset($orders) && $orders ->count() > 0 )
                 @foreach( $orders as $order)

                  <tr>
                    <td class="product-thumbnail">
                      <img src="{{asset('images/products/'.$order->image)}}" width="150" height="200" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black">{{$order->name}}</h2>
                    </td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->pivot->amount}}</td>
                    <td>{{$order->price * $order->pivot->amount}}</td>
                    <td><form style="display: inline;" method="POST" action="{{route('order.destroy',['order'=>$order->id])}}">
                      <button onclick="return confirm('Are you sure?');" class="btn btn-primary btn-xs" type="submit"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>X</button>
                      {{-- <button type="submit" class="btn btn-primary height-auto btn-sm">X</button> --}}
                      @csrf
                    </form></td>
                  </tr>   
                  @endforeach
@endif             
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6">
                <a href="{{route('shop.index')}}" class="btn btn-primary btn-sm btn-block">{{__('frontend.Continue Shopping')}}</a>
              </div>
            </div>
          
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">{{__('frontend.Cart Totals')}}</h3>
                  </div>
                </div> 
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">{{__('frontend.total')}}</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">${{($totalPrice)}}</strong>
                  </div>
                </div>

                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

   @endsection