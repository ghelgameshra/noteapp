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
            "summary" => fake()->text(),
            "details" => '<p><strong style="background-color: rgb(47, 51, 73); color: rgb(182, 190, 227);">Consequatur sit perspiciatis atque doloribus. Maiores et nostrum </strong><span style="background-color: rgb(47, 51, 73); color: rgb(182, 190, 227);">adipisci et ipsam. Nostrum tempore molestiae rem sunt saepe. Officia </span><em style="background-color: rgb(47, 51, 73); color: rgb(182, 190, 227);">voluptas recusandae beatae corrupti est corporis.</em><br><strong style="background-color: rgb(47, 51, 73); color: rgb(182, 190, 227);">Consequatur sit perspiciatis atque doloribus. Maiores et nostrum </strong><span style="background-color: rgb(47, 51, 73); color: rgb(182, 190, 227);">adipisci et ipsam. Nostrum tempore molestiae rem sunt saepe. Officia </span><em style="background-color: rgb(47, 51, 73); color: rgb(182, 190, 227);">voluptas recusandae beatae corrupti est corporis.</em></p>',
            "solution" => '<p><strong style="background-color: rgb(47, 51, 73); color: rgb(182, 190, 227);">Consequatur sit perspiciatis atque doloribus. Maiores et nostrum </strong><span style="background-color: rgb(47, 51, 73); color: rgb(182, 190, 227);">adipisci et ipsam. Nostrum tempore molestiae rem sunt saepe. Officia </span><em style="background-color: rgb(47, 51, 73); color: rgb(182, 190, 227);">voluptas recusandae beatae corrupti est corporis.</em><br><strong style="background-color: rgb(47, 51, 73); color: rgb(182, 190, 227);">Consequatur sit perspiciatis atque doloribus. Maiores et nostrum </strong><span style="background-color: rgb(47, 51, 73); color: rgb(182, 190, 227);">adipisci et ipsam. Nostrum tempore molestiae rem sunt saepe. Officia </span><em style="background-color: rgb(47, 51, 73); color: rgb(182, 190, 227);">voluptas recusandae beatae corrupti est corporis.</em></p>',
            "error_messages" => '<p><strong style="background-color: rgb(47, 51, 73); color: rgb(182, 190, 227);">Consequatur sit perspiciatis atque doloribus. Maiores et nostrum </strong><span style="background-color: rgb(47, 51, 73); color: rgb(182, 190, 227);">adipisci et ipsam. Nostrum tempore molestiae rem sunt saepe. Officia </span><em style="background-color: rgb(47, 51, 73); color: rgb(182, 190, 227);">voluptas recusandae beatae corrupti est corporis.</em><br><strong style="background-color: rgb(47, 51, 73); color: rgb(182, 190, 227);">Consequatur sit perspiciatis atque doloribus. Maiores et nostrum </strong><span style="background-color: rgb(47, 51, 73); color: rgb(182, 190, 227);">adipisci et ipsam. Nostrum tempore molestiae rem sunt saepe. Officia </span><em style="background-color: rgb(47, 51, 73); color: rgb(182, 190, 227);">voluptas recusandae beatae corrupti est corporis.</em></p>',
            "image_path" => $images[random_int(0, 1)]
        ];
    }
}
