<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group([

    'middleware' => 'api',
    'prefix'     => 'auth',

], function ($router) {

    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');

});

Route::group([
    'namespace' => 'App\Http\Controllers\Post',
    //'middleware' => 'jwt.auth'
], function () {
    Route::get('/posts', 'IndexController');
    Route::get('/posts/create', 'CreateController');
    Route::post('/posts', 'StoreController');
    Route::get('/posts/{post}', 'ShowController');
    Route::get('/posts/{post}', 'ShowController');
    Route::get('/posts/{post}/edi', 'EditController');
    Route::patch('/posts/{post}', 'UpdateController');
    Route::delete('/posts/{post}', 'DestroyController');
},);


