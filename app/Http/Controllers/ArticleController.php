<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    // Liste publique
    public function index(): View
    {
        $articles = Article::with('category')->paginate(3);
        $categories = Category::all();

        return view('articles-list', compact('articles', 'categories'));
    }

    // Détails public
    public function details(int $id): View
    {
        $article = Article::with(['category', 'user'])->findOrFail($id);
        return view('articles-details', compact('article'));
    }

    // Liste admin
    public function index2(): View
    {
        $articles = Article::orderBy('created_at', 'desc')->get();
        return view('admin.articles-list', compact('articles'));
    }

    // Formulaire création
    public function create(): View
    {
        $categories = Category::all();
        return view('admin.articles-form', compact('categories'));
    }

    // Enregistrer un nouvel article
  public function store(Request $request)
{
    Article::create($request->only([
        'title',
        'content',
        'category_id',
        'status',
    ]));

    return redirect()->route('admin.articles.list')
        ->with('success', 'Article créé avec succès');
}


    // Formulaire édition
    public function edit(int $id): View
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();

        return view('admin.articles-form', compact('article', 'categories'));
    }

    // Mise à jour
   public function update(Request $request, int $id)
{
    $article = Article::findOrFail($id);

    $article->update($request->only([
        'title',
        'content',
        'category_id',
        'status',
    ]));

    return redirect()->route('admin.articles.list')
        ->with('success', 'Article mis à jour avec succès');
}
    //Suppression des articles
    public function destroy(int $id)
{
    $article = Article::findOrFail($id);
    $article->delete();

    return redirect()->route('admin.articles.list')
        ->with('success', 'Article supprimé avec succès');
}

}
