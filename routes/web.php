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




Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'ArticleController@index')->name('articles.index');
Route::get('/articles/create', 'ArticleController@create')->name('articles.create')->middleware('admin');
Route::post('/articles', 'ArticleController@store')->name('articles.store')->middleware('admin');
Route::get('/articles/{id}/edit', 'ArticleController@edit')->name('articles.edit')->middleware('admin');
Route::PUT('/articles/{id}', 'ArticleController@update')->name('articles.update')->middleware('admin');
Route::get('/articles/{id}', 'ArticleController@show')->name('articles.show');
Route::get('/articles/{id}/delete', 'ArticleController@destroy')->name('articles.destroy')->middleware('admin');
Route::post('/comment/{id}', 'CommentController@add')->name('comment.add');
Route::get('/admin/dashboard', 'UserController@dashboard')->name('admin.dashboard')->middleware('admin');
