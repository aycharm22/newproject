<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/getallcategory','Apicontroller@getallcategory');
Route::post('insertcategory','ApiController@insertcategory');
Route::get('editcategory/{id}','ApiController@editcategory');
Route::post('updatecategory/{id}','ApiController@updatecategory');
Route::delete('deletecategory/{id}','ApiController@deletecategory');

//post
Route::get('getallpost','ApiController@getallpost');
Route::post('insertpost','ApiController@insertpost');
Route::get('editpost/{id}','ApiController@editpost');
Route::post('updatepost/{id}','ApiController@updatepost');
Route::delete('deletepost/{id}','ApiController@deletepost');