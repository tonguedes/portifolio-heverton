<?php

namespace Database\Seeders;

use App\Models\TimelineEvent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class TimelineEventTableSeeder extends Seeder
{
    /**
     * NOTE: placeholder until the real work/education history is provided —
     * see the "My Experience" section on the site. Intentionally does not
     * reuse the original template's (jamesdordoy/Portfolio) fabricated UK
     * career history, since it would misrepresent this site's owner.
     */
    public function run(): void
    {
        TimelineEvent::factory()->create([
            'from' => Carbon::now()->subYears(2),
            'to' => Carbon::now(),
            'name' => 'Your experience goes here',
            'icon' => 'code',
            'title' => 'Full Stack Developer',
            'body' => 'Replace this entry with your real work and education history — company/institution, role, dates, and a short description of what you did.',
        ]);
    }
}
