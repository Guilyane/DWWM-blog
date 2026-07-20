@extends('layouts.app')

@section('content')
<div class="p-6">

    {{-- Titre + bouton nouvel article --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Articles</h1>

        <a href="{{ route('admin.articles.create') }}"
           class="bg-black text-black px-4 py-2 rounded hover:bg-gray-800">
            + Nouvel article
        </a>
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full text-left">
            <thead class="bg-gray-100 border-b">
                <tr>
                    <th class="px-4 py-3 font-medium text-gray-700">Titre</th>
                    <th class="px-4 py-3 font-medium text-gray-700">Catégorie</th>
                    <th class="px-4 py-3 font-medium text-gray-700">Statut</th>
                    <th class="px-4 py-3 font-medium text-gray-700">Date</th>
                    <th class="px-4 py-3 font-medium text-gray-700">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($articles as $article)
                <tr class="border-b hover:bg-gray-50">

                    {{-- Titre --}}
                    <td class="px-4 py-3">{{ $article->title }}</td>

                    {{-- Catégorie --}}
                    <td class="px-4 py-3">{{ $article->category->name }}</td>

                    {{-- Statut --}}
                    <td class="px-4 py-3">
                        @if ($article->status === 'Publié')
                            <span class="flex items-center gap-2 text-green-600">
                                <span class="w-2 h-2 bg-green-600 rounded-full"></span>
                                Publié
                            </span>
                        @else
                            <span class="flex items-center gap-2 text-gray-500">
                                <span class="w-2 h-2 bg-gray-400 rounded-full"></span>
                                Brouillon
                            </span>
                        @endif
                    </td>

                    {{-- Date --}}
                    <td class="px-4 py-3">
                        {{ $article->created_at->format('d/m/Y') }}
                    </td>

                    {{-- Actions --}}
                    <td class="px-4 py-3 flex items-center gap-4">

                        {{-- Modifier --}}
                        <a href="{{ route('admin.articles.edit', $article->id) }}"
                           class="text-blue-600 hover:text-blue-800">
                            ✏️
                        </a>

                        {{-- Supprimer --}}
                        <form action="{{ route('admin.articles.delete', $article->id) }}"
                              method="POST"
                              onsubmit="return confirm('Voulez-vous vraiment supprimer cet article ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">
                                🗑️
                            </button>

                        </form>

                        {{-- Voir (optionnel si tu veux ajouter ➤) --}}
                        <a href="{{ route('articles.details', $article->id) }}"
                           class="text-gray-600 hover:text-gray-800">
                            ➤
                        </a>

                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="flex justify-between items-center mt-4">

        {{-- Bouton précédent --}}
        @if ($articles->onFirstPage())
            <span class="text-gray-400">← Précédent</span>
        @else
            <a href="{{ $articles->previousPageUrl() }}" class="text-blue-600 hover:text-blue-800">
                ← Précédent
            </a>
        @endif

        {{-- Page X/Y --}}
        <span class="text-gray-700">
            Page {{ $articles->currentPage() }} / {{ $articles->lastPage() }}
        </span>

        {{-- Bouton suivant --}}
        @if ($articles->hasMorePages())
            <a href="{{ $articles->nextPageUrl() }}" class="text-blue-600 hover:text-blue-800">
                Suivant →
            </a>
        @else
            <span class="text-gray-400">Suivant →</span>
        @endif

    </div>

</div>
@endsection
