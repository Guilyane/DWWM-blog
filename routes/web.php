<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('home');
});

// --- PUBLIC ---
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}', [ArticleController::class, 'details'])->name('articles.details');

// --- ADMIN ---
Route::get('/admin/articles', [ArticleController::class, 'index2'])
    ->name('admin.articles.list');

// Formulaire de création
Route::get('/admin/articles/create', [ArticleController::class, 'create'])
    ->name('admin.articles.create');

// Enregistrement d’un nouvel article
Route::post('/admin/articles', [ArticleController::class, 'store'])
    ->name('admin.articles.store');

// Formulaire d’édition
Route::get('/admin/articles/{id}/edit', [ArticleController::class, 'edit'])
    ->name('admin.articles.edit');

// Mise à jour d’un article
Route::put('/admin/articles/{id}', [ArticleController::class, 'update'])
    ->name('admin.articles.update');

    // Suppression d’un article
Route::delete('/admin/articles/{id}', [ArticleController::class, 'destroy'])
    ->name('admin.articles.delete');


    //CATEGORIES
Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');
