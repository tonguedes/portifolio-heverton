<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageTableSeeder extends Seeder
{
    public function run(): void
    {
        Language::factory()->create([
            'name' => 'PHP',
            'description' => 'PHP',
        ]);

        Language::factory()->create([
            'name' => 'Laravel',
            'description' => 'PHP',
        ]);

        Language::factory()->create([
            'name' => 'Vue.js',
            'description' => 'PHP',
        ]);

        Language::factory()->create([
            'name' => 'TypeScript',
            'description' => 'PHP',
        ]);

        Language::factory()->create([
            'name' => 'Inertia.js',
            'description' => 'PHP',
        ]);

        Language::factory()->create([
            'name' => 'Tailwind CSS',
            'description' => 'PHP',
        ]);

        Language::factory()->create([
            'name' => 'HTML',
            'description' => 'PHP',
        ]);

        Language::factory()->create([
            'name' => 'CSS',
            'description' => 'PHP',
        ]);

        Language::factory()->create([
            'name' => 'JavaScript',
            'description' => 'PHP',
        ]);

        Language::factory()->create([
            'name' => 'Bootstrap',
            'description' => 'PHP',
        ]);
    }
}
