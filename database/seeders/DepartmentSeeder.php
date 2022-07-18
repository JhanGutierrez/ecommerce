<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Department;
use App\Models\District;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::factory(8)->create()->each(
            fn (Department $department) =>
            City::factory(8)->create([
                'department_id' => $department->id
            ])->each(
                fn (City $city) =>
                District::factory(8)->create([
                    'city_id' => $city->id
                ])
            )
        );
    }
}
