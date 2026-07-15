<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('home');
});

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/categories', [CategoryController::class, 'index']);
// Articles List Route
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

// Article Details Route
Route::get('/articles/{article}', [ArticleController::class, 'details'])->name('articles.details');