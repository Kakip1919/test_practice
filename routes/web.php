<?php

use Illuminate\Support\Facades\Auth;
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

    Route::get('bbs', 'App\Http\Controllers\PostsController@index');
    Route::resource('bbs', 'App\Http\Controllers\PostsController', ['only' => ['index', 'show', 'create', 'store', "edit", 'update']]);
    Route::resource('comment', 'App\Http\Controllers\CommentsController', ['only' => ['store',"edit"]]);
    Route::get("/home", "App\Http\Controllers\HomeController@index")->name("home");

Auth::routes();


