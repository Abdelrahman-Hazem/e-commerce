<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Categoriescontroller;
use App\Http\Controllers\Api\Admin\AuthController;
use App\Http\Middleware\CheckPassword;
use App\Http\Middleware\ChangeLanguage;
use Illuminate\Support\Facades\Auth;
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
// Route::group(['middleware' =>['api','changeLanguage'] ,'namespace'=>'Api'],function () {
//     Route::post('get-main-categories','CategoriesController@index');
//     Route::post('get-category-byId','CategoriesController@getCategoryById');
//     Route::post('change-category-status','CategoriesController@changeStatus');
// });

// Route::group(['middleware' =>['api','checkPassword','changeLanguage','CheckAdminToken'] ,'namespace'=>'Api'],function () {

// Route::get('offers','CategoriesController@index');
// });

// Route::group(['prefix' =>'admin' ,'namespace'=>'Api\Admin'],function () {

//     Route::post('login','AuthController@login');
//     Route::post('logout','AuthController@logout')->middleware('auth.guard:admin-api');
//     });
    
// Route::group(['prefix' =>'user' ,'middleware'=>'auth.guard:user-api'],function () {

//     Route::post('profile',function(){
//         // return "only authenticated user can reach";
//         return Auth::user();
//     });
// });

// Route::group(['prefix' =>'user' , 'namespace'=>'Api\User'],function () {

//     Route::post('login','AuthController@login');
// });

Route::group(['prefix' => LaravelLocalization::setLocale() ,  'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
 {
    Route::apiResource();
 
 });