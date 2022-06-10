<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\Category;
use App\Models\Properties;
use App\Models\Development;
use Illuminate\Database\Seeder;

class SlugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Business::all()->each->save();
        Properties::all()->each->save();
        Development::all()->each->save();
        Category::all()->each->save();
        

    }
}
