<?php

use Aws\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ViewerController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
Route::resource('products','ProductController')->middleware('auth:admin');

                  //web routes
 
Route::resource('shop' , 'ShopController');
Route::resource('orders' , 'OrderController');

Route::resource('contacts' , 'ContactController');

Route::resource('about-us' , 'AboutUsController');

              //Event&Listeners
Route::get('/viewers', 'ViewerController@getNumberOfViewers');
});
