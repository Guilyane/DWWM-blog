@extends('layouts.app')

@section('content')

<div>
    <a href="{{ url('/articles') }}">Retour à la liste</a>
</div>

<div class="mt-4">
    [ {{ $article->category->name ?? 'Sans catégorie' }} ]
</div>

<div class="mt-2 text-sm text-gray-600">
    Par {{ $article->user->name ?? 'Auteur inconnu' }} · 
    {{ $article->created_at ? $article->created_at->translatedFormat('d M Y') : 'Date inconnue' }}
</div>

<div class="mt-6">
    <h1 class="text-2xl font-bold mb-4">{{ $article->title }}</h1>

    <p class="text-gray-800 leading-relaxed">
        {{ $article->content }}
    </p>
</div>

@endsection
