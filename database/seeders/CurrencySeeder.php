<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::create([
            'name' => 'Ghana Cedis',
            'code' => 'GHS',
            'symbol' => '',
        ]);

        Currency::create([
            'name' => 'United State Dollar',
            'code' => 'USD',
            'symbol' => '$',
        ]);
    }
}