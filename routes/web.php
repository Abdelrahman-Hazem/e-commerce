<?php

use Aws\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\category;
use App\Models\Setting;
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
Route::get('pay','FatoorahController@payOrder')->middleware('auth:web');
Route::get('callback',function(){
   return "success";
});
Route::get('error',function(){
   return "error";
});


Route::group(['prefix' => LaravelLocalization::setLocale() ,
  'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],
   function()
 {
   ####################### Admin Login Routes############################### 
 Route::group(['namespace'=>'Auth'] , function(){
    Route::get('admin','CustomAuthController@admin')->name('admin');
    Route::post('admin/login','CustomAuthController@checkAdminLogin')->name('save.admin.login'); 
 });     
Route::resource('admins','AdminController');
Route::post('order/{order}', 'ProductUserController@deleteOrder')->name('order.destroy');
Route::post('neworder/store', 'ProductUserController@makeOrder')->name('product-user.store');
Route::get('all-orders' , 'ProductUserController@getAllOrders')->name('all-orders'); 
Route::get('category-products/{category_id}' , 'ShopController@GetProductsByCategory')
->name('category.products'); 
Route::resource('settings' ,'SettingController');

Route::group(['middleware'=>'can:products'],function(){
   Route::resource('products','ProductController');
 });
################################## Website Routes #######################
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::resource('categories','CategoryController');
Route::view('thankyou', 'frontend.pages.thankyou');
Route::get('my-cart' ,'ProductUserController@myCart')->name('my-cart');

Route::resource('shop' , 'ShopController');
Route::resource('contacts' , 'ContactController');
Route::resource('about-us' , 'AboutUsController');
Route::resource('roles' , 'RoleController');


############################ Share data to multiple views #######################
View::composer(['dashboard.*'], function ($view) {
   $admin = auth()->guard('admin')->user();
   $view->with('admin' , $admin);
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

});
