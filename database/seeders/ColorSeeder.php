<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = [
            'white',
            'black',
            'red',
            'green',
            'yellow',
            'blue'
        ];

        $colorHex = [
            '#FFF',
            '#000',
            '#EB1D36',
            '#83BD75',
            '#FFD24C',
            '#1363DF'
        ];

        foreach ($colors as $key => $value) {
            Color::create(['name' => $value, 'color_hex' => $colorHex[$key]]);
        }
    }
}
