<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategory = [
            [
                'name' => 'Zapatos',
                'slug' => Str::slug('Zapatos'),
                'category_id' => 1
            ],
            [
                'name' => 'Busos',
                'slug' => Str::slug('Busos'),
                'category_id' => 1
            ],

            /* =================================== */

            [
                'name' => 'Sudaderas',
                'slug' => Str::slug('Sudaderas'),
                'category_id' => 2
            ],
            [
                'name' => 'Blusas',
                'slug' => Str::slug('Blusas'),
                'category_id' => 2
            ],
            [
                'name' => 'Zapatos',
                'slug' => Str::slug('Zapatos'),
                'category_id' => 2
            ],
        ];

        foreach ($subcategory as $value) {
            $subcategory = Subcategory::create($value);
            $brands = Brand::factory()->count(4)->create();
            foreach ($brands as $brand) {
                $brand->subcategories()->attach($subcategory->id);
            }
        }
    }
}
