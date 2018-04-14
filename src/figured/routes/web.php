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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware('auth')->group(function () {
    
    Route::get('/', function() {
        return redirect()->route('admin.dashboard');
    });

    Route::get('/dashboard', ["as" => "get.admin.dashboard", 'uses' => "Admin\DashboardController@index"]);
    Route::get('/add', ["as" => "get.admin.blog.add", 'uses' => "Admin\BlogController@add"]);
    Route::post('/add', ["as" => "post.admin.blog.add", 'uses' => "Admin\BlogController@add"]);
});