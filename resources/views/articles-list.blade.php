<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>

    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: auto; padding: 20px; }
        .filters { margin-bottom: 20px; }
        .article-card { border: 1px solid #ddd; padding: 20px; margin-bottom: 20px; border-radius: 6px; }
        .tags span, .category span { background: #eee; padding: 4px 8px; margin-right: 5px; border-radius: 4px; }
        .read-more { text-decoration: none; color: #007bff; font-weight: bold; }
        .pagination { display: flex; justify-content: space-between; align-items: center; margin-top: 30px; }
        .pagination a { color: #007bff; text-decoration: none; font-weight: bold; }
        .pagination span { color: #555; }
        .pagination .disabled { color: #ccc; }
    </style>
</head>
<body>

    <h1>Liste des articles</h1>

    {{-- FILTRE CATEGORIE --}}
    <div class="filters">
        <form method="GET" action="{{ route('articles.index') }}">
            <label for="category">Filtrer par catégorie :</label>
            <select name="category" id="category" onchange="this.form.submit()">
                <option value="">Toutes les catégories</option>

                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" 
                        {{ request('category') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </form>
    </div>

    {{-- LISTE DES ARTICLES --}}
    @foreach ($articles as $article)
        <div class="article-card">
            <div class="category">
                <span>{{ $article->category->name }}</span>
            </div>

            <h2>{{ $article->title }}</h2>

            <p>{{ Str::limit($article->content, 180) }}</p>

            <p><small>{{ $article->created_at->format('d M Y') }}</small></p>

            <a class="read-more" href="{{ route('articles.details', $article->id) }}">
                Lire →
            </a>
        </div>
    @endforeach

    {{-- PAGINATION STYLE MAQUETTE --}}
    <div class="pagination">

        {{-- Précédent --}}
        @if ($articles->onFirstPage())
            <span class="disabled">← Précédent</span>
        @else
            <a href="{{ $articles->previousPageUrl() }}">← Précédent</a>
        @endif

        {{-- Page X/Y --}}
        <span>
            Page {{ $articles->currentPage() }} / {{ $articles->lastPage() }}
        </span>

        {{-- Suivant --}}
        @if ($articles->hasMorePages())
            <a href="{{ $articles->nextPageUrl() }}">Suivant →</a>
        @else
            <span class="disabled">Suivant →</span>
        @endif

    </div>

</body>
</html>

