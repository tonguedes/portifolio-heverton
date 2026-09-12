<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectTableSeeder extends Seeder
{
    public function run(): void
    {
        $portfolio = Project::factory()->create(
            [
                'name' => 'Portfolio',
                'description' => 'My personal portfolio, built with Laravel, Vue.js, Inertia.js and Tailwind CSS.',
                'owner' => 'Me',
                'icon' => '/images/projects/portfolio.png',
                'link' => 'https://portifolio-heverton.onrender.com',
                'complete' => 1,
                'private' => 0,
            ]
        );

        DB::table('taggables')->insert([
            ['tag_id' => 1, 'taggable_id' => $portfolio->id, 'taggable_type' => 'App\Models\Project'],
            ['tag_id' => 2, 'taggable_id' => $portfolio->id, 'taggable_type' => 'App\Models\Project'],
            ['tag_id' => 3, 'taggable_id' => $portfolio->id, 'taggable_type' => 'App\Models\Project'],
            ['tag_id' => 4, 'taggable_id' => $portfolio->id, 'taggable_type' => 'App\Models\Project'],
            ['tag_id' => 5, 'taggable_id' => $portfolio->id, 'taggable_type' => 'App\Models\Project'],
            ['tag_id' => 6, 'taggable_id' => $portfolio->id, 'taggable_type' => 'App\Models\Project'],
        ]);

        $noCoffee = Project::factory()->create(
            [
                'name' => 'No.Coffee',
                'description' => 'Landing page for a healthy food & drinks franchise brand — lead capture forms, business model breakdown and store formats.',
                'owner' => 'Me',
                'icon' => '/images/projects/no-coffee.png',
                'link' => 'https://tonguedes.github.io/No-Coffee/',
                'complete' => 1,
                'private' => 0,
            ]
        );

        DB::table('taggables')->insert([
            ['tag_id' => 7, 'taggable_id' => $noCoffee->id, 'taggable_type' => 'App\Models\Project'],
            ['tag_id' => 8, 'taggable_id' => $noCoffee->id, 'taggable_type' => 'App\Models\Project'],
            ['tag_id' => 9, 'taggable_id' => $noCoffee->id, 'taggable_type' => 'App\Models\Project'],
            ['tag_id' => 10, 'taggable_id' => $noCoffee->id, 'taggable_type' => 'App\Models\Project'],
        ]);

        $receitasInLove = Project::factory()->create(
            [
                'name' => 'Receitas inLove',
                'description' => 'A personal recipe-sharing website built with Laravel, featuring Breeze authentication and social login.',
                'owner' => 'Me',
                'icon' => '/images/projects/receitas-inlove.png',
                'link' => 'https://github.com/tonguedes/Receitas_inLove',
                'complete' => 0,
                'private' => 0,
            ]
        );

        DB::table('taggables')->insert([
            ['tag_id' => 1, 'taggable_id' => $receitasInLove->id, 'taggable_type' => 'App\Models\Project'],
            ['tag_id' => 2, 'taggable_id' => $receitasInLove->id, 'taggable_type' => 'App\Models\Project'],
        ]);
    }
}
