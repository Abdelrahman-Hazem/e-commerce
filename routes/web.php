<?php

use Aws\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ViewerController;
use App\Models\category;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\View ;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::group(['prefix' => LaravelLocalization::setLocale() ,  'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
 {
Route::get('/', 'HomeController@index')->name('home');

                //Login Routes  
 Route::group(['namespace'=>'Auth'] , function(){
    Route::get('admin','CustomAuthController@admin')->middleware('auth:admin')->name('admin');
    Route::get('admin/login','CustomAuthController@adminLogin')->name('admin.login');
    Route::post('admin/login','CustomAuthController@checkAdminLogin')->name('save.admin.login');
    
 });               


                 //admin routes
 Route::resource('settings' ,'SettingController');                
Route::resource('admins','AdminController')->middleware('auth:admin');

Route::resource('categories','CategoryController');
Route::resource('products','ProductController');

                  //web routes

Route::get('my-cart' ,'ProductUserController@myCart')->name('my-cart');
Route::post('order/{order}', 'ProductUserController@deleteOrder')->name('order.destroy');
Route::post('neworder/store', 'ProductUserController@makeOrder')->name('product-user.store');
Route::get('all-orders' , 'ProductUserController@getAllOrders')->name('all-orders');
//Route::resource('orders' , 'ProductUserController');
 

                    // Share data to multiple views
View::composer(['dashboard.*'], function ($view) {
   $admin = auth()->guard('admin')->user();
   $view->with('admin' , $admin);
});

View::composer(['frontend.*'], function ($view) {
   $categories = Category::select('id',
   'name_' . LaravelLocalization::getCurrentLocale() . ' as name')->get();
   $view->with('categories' , $categories);
});

Route::resource('shop' , 'ShopController');
Route::resource('contacts' , 'ContactController');

Route::resource('about-us' , 'AboutUsController');

              //Event&Listeners
Route::get('/viewers', 'ViewerController@getNumberOfViewers');
});
