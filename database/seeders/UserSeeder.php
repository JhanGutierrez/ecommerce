<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use GuzzleHttp\Promise\Create;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::Create([
            'name' => 'Jande Doe',
            'email' => 'janedoe@gmail.com',
            'password' => bcrypt('123456789')
        ]);
    }
}
