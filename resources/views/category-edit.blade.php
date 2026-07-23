@extends('layouts.app')

@section('content')
<div class="p-6">

    <h1 class="text-2xl font-semibold mb-6">Modifier la catégorie</h1>

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="bg-white p-6 shadow rounded">
        @csrf
        @method('PUT')

        <label class="block mb-3">
            <span class="text-gray-700">Nom de la catégorie</span>
            <input type="text" name="name" value="{{ $category->name }}" class="border rounded w-full p-2" required>
        </label>

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-800">
            Mettre à jour
        </button>
    </form>

</div>
@endsection
