@extends('layouts.app')

@section('content')
<div class="p-6">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Articles</h1>

        
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
                    <td class="px-4 py-3">{{ $article->title }}</td>

                    <td class="px-4 py-3">
                        <span class="text-gray-800">{{ $article->category->name }}</span>
                    </td>

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

                    <td class="px-4 py-3">
                        {{ $article->created_at->format('d/m/Y') }}
                    </td>

                    <td class="px-4 py-3 flex items-center gap-4">

                      

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
