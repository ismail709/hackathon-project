<?php

namespace Database\Factories;

use App\Models\Local;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
return [
    'user_id' => User::factory(),
    'local_id' => Local::factory(),
    'date' => $this->faker->dateTimeBetween('+1 days', '+1 month')->format('Y-m-d'),
    'heure' => $this->faker->time(),
    'duree' => rand(1, 4),
    'people_nbr' => rand(2, 30),
];
    }
}
