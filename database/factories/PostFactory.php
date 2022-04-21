<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'      => rand(1, 10),
            'judul'         => $this->faker->sentence,
            'slug'          =>  trim($this->faker->words(2, true)),
            'excerpt'       => $this->faker->words(3, true),
            'isi'           => $this->faker->paragraphs(4, true)
        ];
    }
}
