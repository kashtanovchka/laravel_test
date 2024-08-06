<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' =>'App\Http\Controllers\Post'], function (){
    Route::get('/posts', 'IndexController')->name('post.index');
    Route::get('/posts/create', 'CreateController')->name('post.create');
    Route::post('/posts', 'StoreController')->name('post.store');
    Route::get('/posts/{post}', 'ShowController')->name('post.show');
    Route::get('/posts/{post}/edit', 'EditController')->name('post.edit');
    Route::patch('/posts/{post}', 'UpdateController')->name('post.update');
    Route::delete('/posts/{post}', 'DestroyController')->name('post.delete');

});

//Route::get('/posts', 'App\Http\Controllers\PostController@index')->name('post.index');
//Route::get('/posts/create', 'App\Http\Controllers\PostController@create')->name('post.create');
//Route::post('/posts', 'App\Http\Controllers\PostController@store')->name('post.store');
//Route::get('/posts/{post}', 'App\Http\Controllers\PostController@show')->name('post.show');
//Route::get('/posts/{post}/edit', 'App\Http\Controllers\PostController@edit')->name('post.edit');
//Route::patch('/posts/{post}', 'App\Http\Controllers\PostController@update')->name('post.update');
//Route::delete('/posts/{post}', 'App\Http\Controllers\PostController@destroy')->name('post.delete');


//Route::get('/posts/update', 'App\Http\Controllers\PostController@update');
//Route::get('/posts/delete', 'App\Http\Controllers\PostController@delete');
//Route::get('/posts/first-or-create', 'App\Http\Controllers\PostController@firstOrCreate');
//Route::get('/posts/update-or-create', 'App\Http\Controllers\PostController@updateOrCreate');

Route::group(['namespace' =>'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function (){
    Route::group(['namespace' =>'Post'], function (){
        Route::get('/post', 'IndexController')->name('admin.post.index');
    });
});

Route::get('/main', 'App\Http\Controllers\MainController@index')->name('main.index');
Route::get('/contacts', 'App\Http\Controllers\ContactController@index')->name('contact.index');
Route::get('/about', 'App\Http\Controllers\AboutController@index')->name('about.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
