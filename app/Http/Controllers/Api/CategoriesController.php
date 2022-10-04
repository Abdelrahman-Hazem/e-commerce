<?php

namespace App\Http\Controllers\Api;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    use GeneralTrait;

    public function index()
    {
        
        $categories = Category::select('id','name_'.app()->getLocale())->get();
        return response()->json($categories);
    }

    public function getCategoryById(Request $request)
    {
        $category = Category::select()->find($request->id);
        if(!$category)
       return $this ->returnError('001','This Category does not exsist');
       return $this ->returnData('category',$category,);


    //    الشكل المبدئي
        // return response()->json($category);
    }

    public function changeStatus(Request $request)
    {
        
        Category::where('id',$request->id)->update(['active' =>$request->active]);
        return $this->returnSuccessMassage('statues had been changed');

    }
}
