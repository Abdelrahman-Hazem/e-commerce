<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class ShopController extends Controller
{


  public function index()
  {
  	$products = Product::paginate(2);
  	return view('frontend.pages.shop' , compact('products'));
  }


  public function GetProductsByCategory($category_id)
  {
     $products  = Product::where('category_id' ,$category_id )->paginate(2);
   return view('frontend.pages.shop-by-category' ,compact('products'));
  }

}
