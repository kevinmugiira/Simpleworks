<?php

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

Route::get('/layout', function () {
    return view('layout');
});

Route::get('/about', function () {

    $articles = App\Models\Article::take(3)->latest()->get();

    return view('about',compact('articles'));
   // 'articles' => App\Models\Article::latest()->get();



});

Route::get('/articles/{article}', [\App\Http\Controllers\ArticleController::class,'show']);
