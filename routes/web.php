<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/adminpanel', function () {
    return view('admin.master');
});

//Route::get('/category', function () {
//    return view('admin.category');
//});

Route::group(['middleware'=>'auth'],function(){
    //Category
    Route::get('category','CategoryController@index');
    Route::post('category', 'CategoryController@store');
    Route::get('edit_category/{id}','CategoryController@edit');
    Route::post('category/{id}','CategoryController@update');
    Route::get('update_status/{id}','CategoryController@status');
    Route::get('delete_category/{id}', 'CategoryController@destroy');

//Post
    Route::get('post','PostController@create');
    Route::get('postview', 'PostController@index');
    Route::post('postcreate', 'PostController@store');
    Route::get('update/{id}','PostController@edit');
    Route::get('poststatus/{id}', 'PostController@poststatus');
    Route::post('postupdate/{id}','PostController@update');
    Route::get('postdelete/{id}', 'PostController@destroy');
});
//UI
    Route::get('/','UIController@front');
    Route::get('detail/{id}','UIController@detail');
    Route::get('category/{id}','UIController@category');
    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');



