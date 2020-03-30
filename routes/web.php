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
Route::resource('comment','CommentController');
Route::get('/','PostController@index');
Route::get('/showaddpost','PostController@showAddPost')->name('showAddPost');
Route::post('/addpost','PostController@addPost')->name('post.add');
Route::get('/showcomments/{id}','PostController@showComments')->name('post.comments');
Route::get('/showAddComment/{id}','CommentController@showAddComment')->name('comment.showAddComment');
Route::post('/add/{id}','CommentController@add')->name('comment.add');


