<?php

namespace Database\Seeders;

use App\Models\Amenities;
use Illuminate\Database\Seeder;

class AmenitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Amenities::create([
            'name' => 'Standy Generator',
        ]);
        Amenities::create([
            'name' => 'Uniterrupted Water Supply',
        ]);
        Amenities::create([
            'name' => 'Tarred Road',
        ]);
        Amenities::create([
            'name' => 'Sports Facility Around',
        ]);

    }
}
