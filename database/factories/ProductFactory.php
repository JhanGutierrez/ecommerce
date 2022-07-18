<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $brand = Brand::inRandomOrder()
            ->limit(1)
            ->first();

        $subcategory = Subcategory::inRandomOrder()
            ->limit(1)
            ->first();


        $name = $this->faker->sentence(1);
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->paragraph(),
            'brand_id' => $brand->id,
            'subcategory_id' => $subcategory->id,
            'price' => $this->faker->randomFloat(),
            'status' => $this->faker->randomElement([1, 2]),
            'img_1' => 'products/' . $this->faker->randomElement(['300.jpg', '301.jpg', '302.jpg', '303.jpg', '304.jpg',]),
            'img_2' => 'products/' . $this->faker->randomElement(['300.jpg', '301.jpg', '302.jpg', '303.jpg', '304.jpg',]),
            'img_3' => 'products/' . $this->faker->randomElement(['300.jpg', '301.jpg', '302.jpg', '303.jpg', '304.jpg',]),
            'img_4' => 'products/' . $this->faker->randomElement(['300.jpg', '301.jpg', '302.jpg', '303.jpg', '304.jpg',])
        ];
    }
}
