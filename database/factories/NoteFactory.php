<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category = Category::all()->count();
        $images = ['test.jpg', 'test.webp'];

        return [
            "category_id" => random_int(1, $category),
            "store" => strtoupper(Str::random(4)),
            "summary" => fake()->text(),
            "details" => fake()->text(),
            "solution" => fake()->paragraph(10),
            "error_messages" => fake()->text(),
            "image_path" => $images[random_int(0, 1)]
        ];
    }
}
