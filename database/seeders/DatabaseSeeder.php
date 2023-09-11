<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\DiscountRangeSeeder;
use Database\Seeders\AccessTypeSeeder;
use Database\Seeders\RegionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();


        $this->call([
            // Otros seeders
         
            BrandSeeder::class,
            AccessTypeSeeder::class,
            RegionSeeder::class,

        ]);

      
    }
}


