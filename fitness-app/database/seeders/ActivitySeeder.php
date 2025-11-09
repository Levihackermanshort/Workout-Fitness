<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activities = [
            [
                'date' => '2024-10-15',
                'time_start' => '07:00:00',
                'time_end' => '08:00:00',
                'activity' => 'Morning Jog',
                'time_spent' => '60 mins',
                'distance' => '8 km',
                'set_count' => 0,
                'reps' => 0,
                'note' => 'Great morning run, felt energetic',
            ],
            [
                'date' => '2024-10-15',
                'time_start' => '18:00:00',
                'time_end' => '19:00:00',
                'activity' => 'Push-ups',
                'time_spent' => '30 mins',
                'distance' => null,
                'set_count' => 3,
                'reps' => 15,
                'note' => 'Standard push-ups, good form',
            ],
            [
                'date' => '2024-10-15',
                'time_start' => '19:00:00',
                'time_end' => '19:30:00',
                'activity' => 'Planks',
                'time_spent' => '30 mins',
                'distance' => null,
                'set_count' => 3,
                'reps' => 1,
                'note' => 'Held for 60 seconds each',
            ],
            [
                'date' => '2024-10-16',
                'time_start' => '06:30:00',
                'time_end' => '07:30:00',
                'activity' => 'Yoga Session',
                'time_spent' => '60 mins',
                'distance' => null,
                'set_count' => 0,
                'reps' => 0,
                'note' => 'Vinyasa flow, very relaxing',
            ],
            [
                'date' => '2024-10-16',
                'time_start' => '17:00:00',
                'time_end' => '18:00:00',
                'activity' => 'Weight Training',
                'time_spent' => '60 mins',
                'distance' => null,
                'set_count' => 4,
                'reps' => 12,
                'note' => 'Chest and shoulders workout',
            ],
            [
                'date' => '2024-10-17',
                'time_start' => '08:00:00',
                'time_end' => '09:00:00',
                'activity' => 'Cycling',
                'time_spent' => '60 mins',
                'distance' => '15 km',
                'set_count' => 0,
                'reps' => 0,
                'note' => 'Outdoor cycling, beautiful weather',
            ],
            [
                'date' => '2024-10-17',
                'time_start' => '19:00:00',
                'time_end' => '20:00:00',
                'activity' => 'Squats',
                'time_spent' => '45 mins',
                'distance' => null,
                'set_count' => 4,
                'reps' => 20,
                'note' => 'Bodyweight squats, legs feeling strong',
            ],
            [
                'date' => '2024-10-18',
                'time_start' => '07:00:00',
                'time_end' => '08:00:00',
                'activity' => 'Swimming',
                'time_spent' => '60 mins',
                'distance' => '1.5 km',
                'set_count' => 0,
                'reps' => 0,
                'note' => 'Pool session, worked on technique',
            ],
            [
                'date' => '2024-10-18',
                'time_start' => '18:30:00',
                'time_end' => '19:00:00',
                'activity' => 'Stretching',
                'time_spent' => '30 mins',
                'distance' => null,
                'set_count' => 0,
                'reps' => 0,
                'note' => 'Post-workout stretching routine',
            ],
            [
                'date' => '2024-10-19',
                'time_start' => '06:00:00',
                'time_end' => '07:00:00',
                'activity' => 'CrossFit',
                'time_spent' => '60 mins',
                'distance' => null,
                'set_count' => 0,
                'reps' => 0,
                'note' => 'High intensity workout, very challenging',
            ],
        ];

        foreach ($activities as $activity) {
            Activity::create($activity);
        }
    }
}

