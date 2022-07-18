<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            [
                'name' => 'Hombre',
                'slug' => Str::slug('Hombre')
            ],
            [
                'name' => 'Mujer',
                'slug' => Str::slug('Mujer')
            ],
        ];

        foreach ($category as $value) {
            Category::create($value);
        }
    }
}
