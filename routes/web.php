<?php

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
//use Illuminate\Support\Facades\Route;
//
//Route::prefix('customers/')->group(function (){
//    Route::get('/', 'CustomerController@index')->name('customers.index');
//    Route::get('create','CustomerController@create');
//    Route::post('create','CustomerController@store');
//    Route::get('{id}/edit','CustomerController@show');
//    Route::patch('{id}/update','CustomerController@show');
//    Route::delete('{id}','CustomerController@show');
//
//});

use App\Http\Controllers\CustomerController;

Route::get('/',function (){
    return view('welcome');
});

Route::resource('customers','CustomerController');

Route::get('/customers/{id?}/delete',function ($id){
    return view('customers.delete')->with('id',$id);
});

