<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


use Carbon\Carbon;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        DB::table('articles')->insert(
[
    [
        'title' => 'Introduction au développement web',
        'slug' => 'introduction-developpement-web',
        'content' => 'Cet article présente les bases du développement web, incluant HTML, CSS et JavaScript.',
        'created_at' => Carbon::parse('2024-01-10 10:15:00'),
    ],
    [
        'title' => 'Comprendre le fonctionnement des API',
        'slug' => 'comprendre-fonctionnement-api',
        'content' => 'Une API permet à deux systèmes de communiquer. Découvrez comment elles fonctionnent et comment les utiliser.',
        'created_at' => Carbon::parse('2024-01-12 14:22:00'),
    ],
    [
        'title' => 'Les bonnes pratiques en UX Design',
        'slug' => 'bonnes-pratiques-ux-design',
        'content' => 'L’UX Design vise à améliorer l’expérience utilisateur. Voici les principes essentiels à connaître.',
        'created_at' => Carbon::parse('2024-01-15 09:00:00'),
    ],
    [
        'title' => 'Guide pour débuter avec Laravel',
        'slug' => 'guide-debuter-laravel',
        'content' => 'Laravel est un framework PHP puissant et élégant. Cet article vous aide à démarrer rapidement.',
        'created_at' => Carbon::parse('2024-01-18 16:45:00'),
    ],
    [
        'title' => 'Optimiser les performances de son site web',
        'slug' => 'optimiser-performances-site-web',
        'content' => 'Découvrez différentes techniques pour améliorer la vitesse de chargement et les performances globales de votre site.',
        'created_at' => Carbon::parse('2024-01-20 11:30:00'),
    ],
    [
        'title' => 'Introduction à la cybersécurité',
        'slug' => 'introduction-cybersecurite',
        'content' => 'La cybersécurité est essentielle dans le monde numérique actuel. Voici les concepts fondamentaux à connaître.',
        'created_at' => Carbon::parse('2024-01-22 08:50:00'),
    ],
    [
        'title' => 'Créer un blog avec WordPress',
        'slug' => 'creer-blog-wordpress',
        'content' => 'WordPress est l’un des CMS les plus populaires. Apprenez à créer et personnaliser votre blog.',
        'created_at' => Carbon::parse('2024-01-25 13:10:00'),
    ],
    [
        'title' => 'Les bases du SEO pour débutants',
        'slug' => 'bases-seo-debutants',
        'content' => 'Le SEO permet d’améliorer la visibilité d’un site sur les moteurs de recherche. Voici les notions essentielles.',
        'created_at' => Carbon::parse('2024-01-28 17:05:00'),
    ],
    [
        'title' => 'Découvrir le langage Python',
        'slug' => 'decouvrir-langage-python',
        'content' => 'Python est un langage polyvalent et accessible. Cet article vous présente ses principales caractéristiques.',
        'created_at' => Carbon::parse('2024-01-30 10:40:00'),
    ],
    [
        'title' => 'Comment utiliser Git au quotidien',
        'slug' => 'comment-utiliser-git-quotidien',
        'content' => 'Git est un outil indispensable pour le versionnement de code. Apprenez les commandes essentielles pour bien démarrer.',
        'created_at' => Carbon::parse('2024-02-01 15:20:00'),
    ],
]

        );
    }
}
