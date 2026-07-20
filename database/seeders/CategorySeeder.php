<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert(
            [
    [
        
        'name' => 'Développement Web',
        'slug' => 'developpement-web',
        'created_at' => Carbon::now(),
    ],
    [
        
        'name' => 'Programmation',
        'slug' => 'programmation',
        'created_at' => Carbon::now(),
        
    ],
    [
        
        'name' => 'Cybersécurité',
        'slug' => 'cybersecurite',
        'created_at' => Carbon::now(),
        
    ],
    [
        
        'name' => 'Design & UX',
        'slug' => 'design-ux',
        'created_at' => Carbon::now(),
        
    ],
    [
    
        'name' => 'SEO & Marketing',
        'slug' => 'seo-marketing',
        'created_at' => Carbon::now(),
    ],
    [
        
        'name' => 'Frameworks',
        'slug' => 'frameworks',
        'created_at' => Carbon::now(),
    ],
]

        );
    }
}
