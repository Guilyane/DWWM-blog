@extends('layouts.app')

@section('content')
<div class="p-6 max-w-4xl mx-auto">

    {{-- Bouton retour --}}
    <a href="{{ route('admin.articles.list') }}" class="text-blue-600 hover:underline mb-4 inline-block">
        ← Retour à la liste
    </a>

    <h1 class="text-2xl font-semibold mb-6">
        {{ isset($article) ? 'Modifier un article' : 'Créer un article' }}
    </h1>

    <div class="bg-white shadow rounded-lg p-6">

        {{-- Formulaire --}}
        <form action="{{ isset($article) 
                ? route('admin.articles.update', $article->id) 
                : route('admin.articles.store') }}" 
              method="POST">

            @csrf
            @if(isset($article))
                @method('PUT')
            @endif

            {{-- Titre --}}
            <div class="mb-4">
                <label class="block font-medium mb-1">Titre *</label>
                <input type="text" name="title"
                       value="{{ old('title', $article->title ?? '') }}"
                       class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-300">
            </div>

            {{-- Catégorie --}}
            <div class="mb-4">
                <label class="block font-medium mb-1">Catégorie *</label>
                <select name="category_id"
                        class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-300">
                    <option value="">Sélectionner une catégorie</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $article->category_id ?? '') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Tags --}}
            <div class="mb-4">
                <label class="block font-medium mb-1">Tags</label>

                <div class="flex flex-wrap gap-2">
                    @if(isset($article))
                        {{-- @foreach ($article->tags as $tag)
                            <span class="px-3 py-1 bg-gray-200 rounded-full text-sm">
                                {{ $tag->name }}
                            </span>
                        @endforeach --}}
                    @endif
                </div>

                <button type="button"
                        class="mt-2 text-blue-600 hover:underline">
                    + Ajouter un tag
                </button>
            </div>

            {{-- Contenu --}}
            <div class="mb-4">
                <label class="block font-medium mb-1">Contenu *</label>
                <textarea name="content" rows="8"
                          class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-300">{{ old('content', $article->content ?? '') }}</textarea>
            </div>

            {{-- Statut --}}
            <div class="mb-6">
                <label class="block font-medium mb-2">Statut</label>

                <div class="flex items-center gap-6">
                    <label class="flex items-center gap-2">
                        <input type="radio" name="status" value="Brouillon"
                               {{ old('status', $article->status ?? 'Brouillon') === 'Brouillon' ? 'checked' : '' }}>
                        Brouillon
                    </label>

                    <label class="flex items-center gap-2">
                        <input type="radio" name="status" value="Publié"
                               {{ old('status', $article->status ?? '') === 'Publié' ? 'checked' : '' }}>
                        Publié
                    </label>
                </div>
            </div>

            {{-- Boutons --}}
            <div class="flex justify-end gap-4">
                <a href="{{ route('admin.articles.list') }}"
                   class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">
                    Annuler
                </a>

                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Enregistrer
                </button>
            </div>

        </form>

    </div>
</div>
@endsection
