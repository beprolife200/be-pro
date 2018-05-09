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

use BePro\Post\Post;

Route::get('/', function () {
    $posts = Post::orderBy('created_at', 'dest')->get();
    return view('welcome')->with('posts', $posts);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/posts', 'PostController@create')->name('post-create');
Route::get('/posts/{post}', 'PostController@show')->name('post-show');
Route::post('/posts', 'PostController@store')->name('post-store');

Route::group(['prefix' => 'api'], function () {
    Route::get('series', 'SeriesController@index');
    Route::get('tags', 'TagController@index');
    Route::post('tags', 'TagController@store');
});
    
Route::group(['prefix' => 'api/posts'], function () {
    Route::post('/', 'PostController@ajaxStore');
    Route::get('/{post}', 'PostController@getPost');
    Route::post('/{post}/tags/{tag}', 'PostController@attachTag');
    Route::put('/{post}', 'PostController@ajaxUpdate');
});