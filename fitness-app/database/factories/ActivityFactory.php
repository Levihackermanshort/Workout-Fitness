<?php

namespace Database\Factories;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Activity::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $activities = [
            'Morning Jog', 'Evening Run', 'Weight Training', 'Yoga Session', 'Cycling',
            'Swimming', 'Push-ups', 'Squats', 'Planks', 'CrossFit', 'HIIT Workout',
            'Pilates', 'Zumba', 'Boxing', 'Martial Arts', 'Rock Climbing', 'Hiking',
            'Basketball', 'Football', 'Tennis', 'Badminton', 'Volleyball', 'Dancing',
            'Stretching', 'Meditation', 'Rowing', 'Elliptical', 'Treadmill', 'Stair Climbing'
        ];

        $timeUnits = ['mins', 'minutes', 'hour', 'hours'];
        $distanceUnits = ['km', 'miles', 'm'];
        
        $startHour = $this->faker->numberBetween(5, 20);
        $startMinute = $this->faker->randomElement([0, 15, 30, 45]);
        $duration = $this->faker->numberBetween(15, 120);
        $endHour = $startHour + floor(($startMinute + $duration) / 60);
        $endMinute = ($startMinute + $duration) % 60;
        
        if ($endHour >= 24) {
            $endHour = 23;
            $endMinute = 59;
        }

        $activity = $this->faker->randomElement($activities);
        $hasDistance = in_array(strtolower($activity), ['jog', 'run', 'cycling', 'swimming', 'hiking', 'rowing']);
        $hasSetsReps = in_array(strtolower($activity), ['weight training', 'push-ups', 'squats', 'planks', 'crossfit', 'hiit workout']);

        return [
            'date' => $this->faker->dateTimeBetween('-6 months', 'now')->format('Y-m-d'),
            'time_start' => sprintf('%02d:%02d:00', $startHour, $startMinute),
            'time_end' => sprintf('%02d:%02d:00', $endHour, $endMinute),
            'activity' => $activity,
            'time_spent' => $duration . ' ' . $this->faker->randomElement($timeUnits),
            'distance' => $hasDistance ? $this->faker->randomFloat(1, 1, 25) . ' ' . $this->faker->randomElement($distanceUnits) : null,
            'set_count' => $hasSetsReps ? $this->faker->numberBetween(1, 5) : 0,
            'reps' => $hasSetsReps ? $this->faker->numberBetween(5, 50) : 0,
            'note' => $this->faker->optional(0.7)->sentence($this->faker->numberBetween(5, 15)),
        ];
    }
}
