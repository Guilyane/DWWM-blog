@extends('layouts.app')

@section('content')
<div class="p-6">

    <h1 class="text-2xl font-semibold mb-6">Créer une catégorie</h1>

    <form action="{{ route('admin.categories.store') }}" method="POST" class="bg-white p-6 shadow rounded">
        @csrf

        <label class="block mb-3">
            <span class="text-gray-700">Nom de la catégorie</span>
            <input type="text" name="name" class="border rounded w-full p-2" required>
        </label>

        <button class="bg-black text-black px-4 py-2 rounded hover:bg-gray-800">
            Enregistrer
        </button>
    </form>

</div>
@endsection
