<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Category::create([
            'name' => 'House For Rent',
        ]);
        Category::create([
            'name' => 'Apartment For Sale',
        ]);
        Category::create([
            'name' => 'House For Sale',
        ]);
        Category::create([
            'name' => 'Gated Communities',
        ]);
        Category::create([
            'name' => 'Hostels',
        ]);
        Category::create([
            'name' => 'Luxury Apartments',
        ]);
        Category::create([
            'name' => 'New And Ongoing Development',
        ]);
        Category::create([
            'name' => 'Commercial Properties',
        ]);
    }
}
