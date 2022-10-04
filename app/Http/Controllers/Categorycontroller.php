<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category ;
use Illuminate\Support\Facades\DB;
use App\Models\Product ;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Categorycontroller extends Controller
{
	  public function __construct()
    {
        $this->middleware('auth:admin');
    }

   

public function show(Category $category)
{
    $products = DB::table('products')
    ->where('category_id','=',$category->id)
    ->paginate(1);
    return view('frontend.pages.category',compact('products'));


    // $products = Product::
    // where('category_id','=',$category->id)
    // ->paginate(1);
    // return view('pages.web_pages.category',compact('products'));


}

  
  }
