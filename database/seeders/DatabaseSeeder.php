<?php

namespace Database\Seeders;

use App\Models\Amenities;
use App\Models\Business;
use App\Models\Category;
use App\Models\Package;
use App\Models\User;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user1 = User::factory()->create([
            'firstname' => 'Gabriel',
            'lastname' => 'Abiah',
            'role' => 'agent',
            'email' => 'gabriel@manifestghana.com',
            'mobile' => '0546747672',
            'password' => bcrypt('0546747672'),
        ],);
        $user2 = User::factory()->create([
            'firstname' => 'Erob',
            'lastname' => 'Osei',
            'role' => 'admin',
            'email' => 'info@1blockghana.com',
            'mobile' => '0546747672',
            'password' => bcrypt('1blockghana'),
        ]);

        $category = Category::create([
            'name' => 'House For Sale',
        ]);

        $package = Package::create([
            'name' => 'Basic',
            'type' => 'Free',
            'listing_limit' => 5,
            'image_upload_limit' => 4,
            'video_upload_limit' => 1,
        ]);

        Business::factory()->create([
            'user_id'=>$user2->id,
            'category_id'=> $category->id,
            'package_id'=> $package->id,
            'name'=> '1 Block Ghana',
            'email' => $user2->email,
            'mobile' => $user2->mobile,
        ]);

        $this->call([
            AmenitiesSeeder::class,
            CategorySeeder::class,
            CurrencySeeder::class,
            PackageSeeder::class
        ]);


    }
}