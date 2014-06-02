<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function(){ return View::make('dashboard'); });
Route::get('dashboard', function(){	return View::make('components.mainpage'); });
Route::get('vendor/overview', function(){ return View::make('vendor.overview'); });
Route::get('product/add', function(){ return View::make('product.add'); });
Route::get('product/edit', function(){ return View::make('product.edit'); });
Route::get('product/overview', function(){ return View::make('product.overview'); });
Route::get('product/import', function(){ return View::make('product.import'); });
Route::get('categories', function(){ return View::make('category.overview'); });
Route::get('orders', function(){ return View::make('order.overview'); });
Route::get('details/{id}', function($id){ return View::make('product.edit'); });

Route::get('overview', function(){
    $content = View::make('contents/overview');
    return View::make('index', array('content' => $content));
});
Route::get('item/categories/{id}', function($id){
    $content = View::make('contents/overview', array('id' => $id));
    return View::make('index', array('content' => $content));
});


