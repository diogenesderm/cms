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




Route::middleware(['auth'])->group(function () {

    Auth::routes();

    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('categories', 'Categorycontroller');

    Route::resource('posts', 'PostController')->middleware(['auth']);

    Route::get('trashed-posts', 'PostController@trashed')->name('trashed-posts.index');

    Route::put('restore-post{post}', 'PostController@restore')->name('restore-posts');
});
