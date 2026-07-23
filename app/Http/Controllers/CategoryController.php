<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::withCount('articles')->paginate(3);
        return view('categories-list', ['categories' => $categories]);
    }

    public function create(): View
    {
        return view('category-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:255'
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Catégorie créée avec succès.');
    }

    public function edit($id): View
    {
        $category = Category::findOrFail($id);
        return view('category-edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:2|max:255'
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name
        ]);

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Catégorie mise à jour.');
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Catégorie supprimée.');
    }
}
