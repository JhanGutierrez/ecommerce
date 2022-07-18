<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\Product;
use App\Models\ProductEntry;
use App\Models\Size;
use Illuminate\Database\Seeder;

class ProductEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();
        $colors = Color::all();
        $sizes = Size::all();

        $varian_1 = fn ($productId) => [
            'product_id' => $productId,
            'size_id' => $sizes->random()->id,
            'color_id' => $colors->random()->id,
            'quantity' => rand(1, 4)
        ];

        $varian_2 =  fn ($productId) => [
            'product_id' => $productId,
            'color_id' => $colors->random()->id,
            'quantity' => rand(1, 4)
        ];

        $varian_3 = fn ($productId) => [
            'product_id' => $productId,
            'quantity' => rand(1, 4)
        ];

        foreach ($products as $value) {
            $randVariant = rand(1, 3);

            if ($randVariant == 1) {
                for ($i = 0; $i < rand(1, 4); $i++) {
                    ProductEntry::create($varian_1($value->id));
                }
            } elseif ($randVariant == 2) {
                for ($i = 0; $i < rand(1, 4); $i++) {
                    ProductEntry::create($varian_2($value->id));
                }
            } elseif ($randVariant == 3) {
                ProductEntry::create($varian_3($value->id));
            }
        }
    }
}
