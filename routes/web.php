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

Route::get('/','ProductsController@index');

Route::view('/allproducts','admin.products');

Route::get('/add','ProductsController@create');

Route::get('/newcategory','CategoryController@create');

Route::view('/categories','admin.categories');

Route::delete('/categorydelete/{category}','CategoryController@destroy');

Route::get('/categoryedit/{category}','CategoryController@edit');

Route::patch('/categoryupdate/{category}','CategoryController@update');

Route::POST('/save','ProductsController@store');

Route::get('/edit/{products}','ProductsController@edit')->name('admin.edit');

Route::patch('/update/{products}','ProductsController@update')->name('admin.edit');

Route::POST('/store','CategoryController@store');

Route::POST('/sendmessage/{products}','MessagesController@store');

Route::delete('/image/delete/{images}','ImagesController@destroy');

Route::get('/pictures/{products}','ImagesController@create'); 

Route::post('/getpicture/{products}','ImagesController@store')->name('admin.edit'); 


Route::get('/open/{products}','ProductsController@show');

Route::get('/single/{products}','ProductsController@open');

Route::delete('/delete/{products}', 'ProductsController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
