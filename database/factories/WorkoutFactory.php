<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Workout>
 */
class WorkoutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "dates" => $this->faker->date,
            "workouttype" => "bench",
            "sets" => $this->faker->randomDigit,
            "reps" => $this->faker->randomDigit,
            "weight" => $this->faker->randomDigit,
            "duration" => $this->faker->randomDigit,
            "comment" => $this->faker->text(200),
            "user_id" => "1"
        ];
    }
}