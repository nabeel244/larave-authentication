<?php

use Illuminate\Routing\RouteGroup;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::prefix('admin/')->group(function () {
    Route::resource('product', ProductController::class);
    Route::get('home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');
});

Route::get('/home', 'HomeController@index')->name('home');
