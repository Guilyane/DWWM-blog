@extends('layouts.app')

@section('content')
<div class="p-6">

    {{-- Titre + bouton nouvelle catégorie --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Catégories</h1>

        <a href="{{ route('admin.categories.create') }}"
           class="bg-black text-black px-4 py-2 rounded hover:bg-gray-800">
            + Nouvelle catégorie
        </a>
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full text-left">
            <thead class="bg-gray-100 border-b">
                <tr>
                    <th class="px-4 py-3 font-medium text-gray-700">Nom</th>
                    <th class="px-4 py-3 font-medium text-gray-700">Nb d'articles associés</th>
                    <th class="px-4 py-3 font-medium text-gray-700">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($categories as $category)
                <tr class="border-b hover:bg-gray-50">

                    {{-- Nom --}}
                    <td class="px-4 py-3">{{ $category->name }}</td>

                    {{-- Nombre d'articles --}}
                    <td class="px-4 py-3">{{ $category->articles_count }}</td>

                    {{-- Actions --}}
                    <td class="px-4 py-3 flex items-center gap-4">

                        {{-- Modifier --}}
                        <a href="{{ route('admin.categories.edit', $category->id) }}"
                           class="text-blue-600 hover:text-blue-800">
                            ✏️
                        </a>

                        {{-- Supprimer --}}
                        <form action="{{ route('admin.categories.delete', $category->id) }}"
                              method="POST"
                              onsubmit="return confirm('Voulez-vous vraiment supprimer cette catégorie ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">
                                🗑️
                            </button>
                        </form>

                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection