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

Auth::routes();

Route::get('/', ['as' => 'get.blogs', 'uses' => "HomeController@index"]);
Route::get('/{id}', ['as' => 'get.blog', 'uses' => "HomeController@blog"]);

Route::get('/home', function() {
    return redirect()->route('get.admin.dashboard');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    
    Route::get('/', function() {
        return redirect()->route('get.admin.dashboard');
    });

    Route::get('/dashboard', ["as" => "get.admin.dashboard", 'uses' => "Admin\BlogController@index"]);
    Route::get('/add', ["as" => "get.admin.blog.add", 'uses' => "Admin\BlogController@add"]);
    Route::post('/add', ["as" => "post.admin.blog.add", 'uses' => "Admin\BlogController@post"]);
    Route::get('/edit/{id}', ["as" => "get.admin.blog.edit", 'uses' => "Admin\BlogController@edit"]);
    Route::post('/edit/{id}', ["as" => "post.admin.blog.edit", 'uses' => "Admin\BlogController@put"]);
});