<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Categoriescontroller;
use App\Http\Controllers\Api\Admin\AuthController;
use App\Http\Middleware\CheckPassword;
use App\Http\Middleware\ChangeLanguage;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\View ;
use App\Models\category;
use App\Models\Setting;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Default :
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Routes = api
// All routes or api here must be authenticated by api 
Route::group(['middleware' =>['api','changeLanguage'] ,'namespace'=>'Api'],function () {
    Route::post('get-main-categories','CategoriesController@index');
    Route::post('get-category-byId','CategoriesController@getCategoryById');
    Route::post('change-category-status','CategoriesController@changeStatus');
});

Route::group(['middleware' =>['api','checkPassword','changeLanguage','CheckAdminToken'] ,'namespace'=>'Api'],function () {

Route::get('offers','CategoriesController@index');
});

Route::group(['prefix' =>'admin' ,'namespace'=>'Api\Admin'],function () {

    Route::post('login','AuthController@login');
    Route::post('logout','AuthController@logout')->middleware('auth.guard:admin-api');
    });
    
Route::group(['prefix' =>'user' ,'middleware'=>'auth.guard:user-api'],function () {

    Route::post('profile',function(){
        // return "only authenticated user can reach";
        return Auth::user();
    });
});

Route::group(['prefix' =>'user' , 'namespace'=>'Api\User'],function () {

    Route::post('login','AuthController@login');
});

Route::group([ 'namespace'=>'Api','prefix' => LaravelLocalization::setLocale() , 
 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'] ],
  function()
 {
    Route::apiResource('settings' ,'SettingController')->only(['edit','update']);
    Route::apiResource('categories','CategoryController');
    Route::apiResource('products','ProductController');
    Route::view('thankyou', 'frontend.pages.thankyou');
    ############### all Product user routes#########
    Route::get('my-cart' ,'ProductUserController@myCart')->name('my-cart');
    Route::post('order/{order}', 'ProductUserController@deleteOrder')->name('order.destroy');
    Route::post('neworder/store', 'ProductUserController@makeOrder')->name('product-user.store');
    Route::get('all-orders' , 'ProductUserController@getAllOrders')->name('all-orders');
    ###############shop routes##################### 
    Route::get('category-products/{category_id}' , 'ShopController@GetProductsByCategory')
    ->name('category.products');
    Route::apiResource('shop' , 'ShopController');
    ###############################################
    Route::apiResource('contacts' , 'ContactController');
    Route::apiResource('about-us' , 'AboutUsController');
 });

 View::composer(['*'], function ($view) {
    $categories = Category::select('id',
    'name_' . LaravelLocalization::getCurrentLocale() . ' as name')->get();
    $view->with('categories' , $categories);
 });
 
 View::composer(['frontend.*'], function ($view) {
    $settings = Setting::select('id',
    'site_name_' . LaravelLocalization::getCurrentLocale() . ' as site_name' ,
    'site_title_' . LaravelLocalization::getCurrentLocale() . ' as site_title',
    'title_desc_' . LaravelLocalization::getCurrentLocale() . ' as title_desc',
    'about_us_' . LaravelLocalization::getCurrentLocale() . ' as about_us',
    'address_' . LaravelLocalization::getCurrentLocale() . ' as address',
    'phone_' . LaravelLocalization::getCurrentLocale() . ' as phone',
      'email')->first();
    $view->with('settings' , $settings);
 });