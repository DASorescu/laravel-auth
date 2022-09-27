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


Auth::routes(['register'=> false]);


Route::middleware('auth')->prefix('admin')->group(function(){
    Route::get('/', 'Admin\HomeController@index')->name('admin.home');
    
    // Resource POST
    Route::resource('posts','PostController');
    Route::get('{any}',function(){
        abort('404');
    })->where('any','.*');
});

Route::get('/{any?}', function () {
return view('guest.home');
})->where('any','.*');