<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Uses Factory for seeding (extra credit) - creates 35 activities for pagination demonstration.
     */
    public function run(): void
    {
        // Use factory to create 35 activities (enough to demonstrate pagination)
        Activity::factory()->count(35)->create();
    }
}

