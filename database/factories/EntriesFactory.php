<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entries>
 */
class EntriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "habit_id" => "2",
            "entry" => $this->faker->text(20),
            "datetime" => $this->faker->dateTime(),
            
        ];
    }
}
