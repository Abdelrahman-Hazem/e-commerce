<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Traits\SaveImageTrait;
class ProductController extends Controller
{
    
  use SaveImageTrait;



public function index()
{
  $products=Product::all();
 return response()->json($products) ;
}




public function store(Request $request)
{
$data =request()-> validate([
 'name' =>'required',
 'price' =>'required',
 'image' =>'required|file|image',
 'serial_number' =>'required',
 'stock' =>'required',
 'category_id' =>'required',
 'description' =>'required',
    ]);
$file_name = $this->saveImage($request->image,'images/products');

 $product = new Product();
 $product->name = $request->name;
 $product->price = $request->price;
 $product->image = $file_name;        
 $product->serial_number = $request->serial_number;
 $product->stock = $request->stock;
 $product->category_id = $request->category_id;
 $product->description = $request->description;
 $product->save();
    if($product){
      return "Data had been saved";
    }else{
      return "something went wrong";
    }
}
public function show(Product $product)
{
  return response()->json($product);
}

 public function edit(Product $product)
 {
  return response()->json($product); }

 public function update(Request $request ,Product $product)
 {

 $data =request()-> validate([
  'name' =>'required',
  'price' =>'required',
  'image' =>'required|file|image',
  'serial_number' =>'required',
  'stock' =>'required',
  'category_id' =>'required',
  'description' =>'required',
 ]);
$file_name = $this->saveImage($request->image,'images/products');

   $product->name = $request->name;
   $product->price = $request->price;
   $product->image = $file_name;        
   $product->serial_number = $request->serial_number;
   $product->stock = $request->stock;
   $product->category_id = $request->category_id;
   $product->description = $request->description;
   $product->update();
   if($product){
    return "Data had been updated";
   }else{
    return"Some thing went wrong";
   }
 }

public function destroy(Product $product)
{
  $product->delete();
  if($product){
    return "Data had been deleted";
  }else{
    "some thing went wrong";
  }
}

}
