<?php

use App\Http\Controllers\Blog\PostsController;

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

Route::get('/', 'WelcomeController@index');

Route::get('/blog/posts/{post}', [PostsController::class,'show'])->name('blog.show');

Route::middleware(['auth'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('categories', 'Categorycontroller');

    Route::resource('tags', 'TagsController');

    Route::resource('posts', 'PostController')->middleware(['auth']);

    Route::get('trashed-posts', 'PostController@trashed')->name('trashed-posts.index');

    Route::put('restore-post{post}', 'PostController@restore')->name('restore-posts');
});

Route::get('/users', 'UserController@index')->name('users');

Route::get('/users/edit', 'UserController@edit')->name('edit');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/users', 'UserController@index')->name('users');
    Route::get('users/profile', 'Usercontroller@edit')->name('users.edit-profile');


    Route::put('users/profile', 'UserController@update')->name('users.update-profile');
    Route::post('/users/{user}/make-admin', 'UserController@makeAdmin')->name('users.make-admin');
});
