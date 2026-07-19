<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>

    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: auto; }
        .filters { margin-bottom: 20px; }
        .article-card { border: 1px solid #ddd; padding: 20px; margin-bottom: 20px; border-radius: 6px; }
        .tags span, .category span { background: #eee; padding: 4px 8px; margin-right: 5px; border-radius: 4px; }
        .read-more { text-decoration: none; color: #007bff; font-weight: bold; }
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

                {{-- @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" 
                        {{ request('category') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach --}}
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

    {{-- PAGINATION --}}
    <div>
        {{ $articles->links() }}
    </div>

</body>
</html>
