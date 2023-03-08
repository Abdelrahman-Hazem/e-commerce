<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductsResource;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Traits\SaveImageTrait;
class ProductController extends Controller
{
    
  use SaveImageTrait;



public function index()
{
  $products_query=Product::all();
  $products = ProductsResource::collection($products_query);
  if($products){
    return response()->json([
        'status'=>true,
        'msg'=>"",
        'data'=>$products
    ]);

   }else{
    return response()->json([
        'status'=>false,
        'msg'=>"something went wrong",
        'error-code'=>401
     ]);
   }
}




public function store(Request $request)
{
  
$product =request()-> validate([
 'name' =>'required',
 'price' =>'required',
 'image' =>'required',
 'serial_number' =>'required',
 'stock' =>'required',
 'category_id' =>'required|max:3',
 'description' =>'required',
    ]);

 $product = new Product();
 $product->name = $request->name;
 $product->price = $request->price;
 $product->image = $request->image;        
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


 public function show(Request $request)
 {
  $product_query = Product::where('id',$request->id)->first(); 
  $product = new ProductsResource($product_query);
  if($product){
    return response()->json([
        'status'=>true,
        'msg'=>"success",
        'data'=>$product
    ]);
}else{
    return response()->json([
        'status'=>false,
        'msg'=>"something went wrong",
        'error-code'=>401
     ]);
}
   }

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
