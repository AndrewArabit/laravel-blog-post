<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           "post_id" => null, 
           "name" => fake()->name,
           "comment" => fake ()->paragraph(),
           'created_at' => fake()->dateTimeBetween('-2 years'),
           'updated_at' => fake()->dateTimeBetween('created_at', 'now')
        ];
    }
}
