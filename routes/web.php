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

    $articles = App\Models\Article::take(4)->latest()->get();

    return view('about',compact('articles'));
   // 'articles' => App\Models\Article::latest()->get();



});

Route::get('/articles', [App\Http\Controllers\ArticleController::class, 'index'])->name('articles.index');
Route::post('/articles', [App\Http\Controllers\ArticleController::class, 'store']);
Route::get('/articles/create', [App\Http\Controllers\ArticleController::class, 'create']);
Route::get('/articles/{article}/edit', [App\Http\Controllers\ArticleController::class, 'edit']);
Route::get('/articles/{artic}', [App\Http\Controllers\ArticleController::class,'show'])->name('articles.show');
Route::put('/articles/{article}', [App\Http\Controllers\ArticleController::class,'update']);




