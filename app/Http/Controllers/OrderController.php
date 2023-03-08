<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\ProductUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;

class OrderController extends Controller
{
    public function getAllOrders()
    {
    
      $orders = DB::table('products')
      ->join('product_user' ,'products.id', '=' ,'product_user.product_id')
      ->join('users' , 'users.id' , '=' , 'product_user.user_id')
      ->select( 'price' ,'products.image','products.name As product_name' ,
                'users.name As user_name' ,'phone' ,'address',
                'product_user.created_at' , 'status'
      
      )->get();
      return view('dashboard.pages.orders.index' ,compact('orders'));
      
    }


       public function totalOrdersPrice()
       {
        $userId = auth()->guard('web')->id();
        $user = User::find($userId);
        $orders = $user ->products; 
        $totalPrice = 0;
        foreach ($orders as $order) {
         $orderPrice = $order->price * $order->pivot->amount ;
        $totalPrice = $totalPrice + $orderPrice;
        }
        return $totalPrice ;
       }
    

   public function myCart()
   {
     if(Auth::guard('web')->check()){
        $userId = auth()->guard('web')->id();
      $user = User::find($userId);
        $orders = $user ->products;
        $totalPrice = $this -> totalOrdersPrice() ;
      return view ('frontend.pages.orders' ,compact('orders' ,'totalPrice'));
     } else{
       return redirect('login');
      }
   }

   public function makeOrder(Request $request)
   {
    if (Auth::guard('web')->check()) {
    $data = $request->validate([
      'size' =>'required',
      'amount' =>'required'
    ]);
   // many to many save method
     $userId = auth()->guard('web')->id(); 
     $user =User::find($userId);
     $user ->products()->attach(
       $request->product_id ,['amount' =>$request->amount ,'size' =>$request->size ,
       'status' => 0]);
      return redirect('thankyou');
     }else {
      return redirect('login');
     }
   }

   public function deleteOrder(Request $request)
   {
    //return $request->order ;
    $userId = auth()->guard('web')->id(); 
    $user =User::find($userId);
    $user ->products()->detach(
      $request->order);
      return back();
  }
     //get special column from product
    // return $orders = User::with(['products'=>function($q){
    //     $q->select('products.id' ,'name');
    // }])->find('1');

      // get the user 's orders
        //return $orders = User::with('products')->find('id of the user');
    }


     // $advertisers =Advertiser::all();
        // foreach($advertisers as $advertiser)
        // $advertiserAds = $advertiser->ads;
        // foreach($advertiserAds as $advertiserAd)
        //   $start_date = $advertiserAd->start_date ;
        
 
