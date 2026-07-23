{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Dynamic Title for each page -->
    <title>Formulaire inscription</title>
    <!-- Add your CSS / Tailwind framework here -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<!-- Global Header (Persistent on all screens) -->
    <header class="border-b border-gray-300 max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
        <!-- Logo / Placeholder box -->
        <div class="w-12 h-12 border-2 border-black flex items-center justify-center relative">
            <span class="absolute inset-0 flex items-center justify-center text-xl font-light">✕</span>
        </div>
    </header>
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-md bg-white shadow-md rounded-lg p-8">

        <h1 class="text-2xl font-bold mb-4 text-center">Créer un nouveau compte</h1>

        {{-- <p class="text-center mb-6">
            Vous êtes déjà inscrit ?
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Se connecter</a>
        </p> --}}

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label class="block font-medium mb-1">Prénom</label>
                <input type="text" name="firstname" class="w-full border rounded p-2"
                       value="{{ old('firstname') }}" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Nom</label>
                <input type="text" name="lastname" class="w-full border rounded p-2"
                       value="{{ old('lastname') }}" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Email</label>
                <input type="email" name="email" class="w-full border rounded p-2"
                       value="{{ old('email') }}" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Mot de passe</label>
                <input type="password" name="password" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-6">
                <label class="block font-medium mb-1">Confirmer le mot de passe</label>
