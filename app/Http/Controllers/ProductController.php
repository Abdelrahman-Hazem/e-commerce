<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product ;
use App\Models\Category ;
use App\Traits\SaveImageTrait;
// to store image
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

  use SaveImageTrait;

  
         public function __construct()
  {
    $this->middleware('auth:admin');
  }

    public function index()
       {
        $products = Product::all();
         return view('dashboard.pages.products.index' ,compact('products'));
       }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.pages.products.create_products' ,compact('categories'));
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
        return back();
    }
    public function show(Product $product)
    {
       return view('dashboard.pages.products.show_product' ,compact('product'));
    }

        public function edit(Product $product)
        {
          $categories = Category::all();
          return view('dashboard.pages.products.edit_product' ,compact('product' ,'categories'));
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
          return redirect('admins');
        }

       public function destroy(Product $product)
       {
         $product->delete();
         return redirect('products');
       }
   
}
