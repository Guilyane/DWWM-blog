<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        // On utilise paginate() pour activer la pagination
        $articles = Article::with('category')->paginate(10);

        return view('articles-list', compact('articles'));
    }

    public function details(int $id): View
    {
        $article = Article::with(['category', 'user'])->findOrFail($id);

        return view('articles-details', compact('article'));
    }
}
