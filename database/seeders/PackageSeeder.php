<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Package;
class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Package::create([
            'name' => 'Intermediate',
            'type' => 'Paid',
            'listing_limit' => 10,
            'image_upload_limit' => 9,
            'video_upload_limit' => 1,
        ]);

        Package::create([
            'name' => 'Premium',
            'type' => 'Piad',
            'listing_limit' => 10,
            'image_upload_limit' => 14,
            'video_upload_limit' => 1,
        ]);
    }
}
