<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Region::create([
            'code' => 'NAM',
            'name' => 'North America & Canada',
            'display_order' => 1,
        ]);

        Region::create([
            'code' => 'EMEA',
            'name' => 'Europe, Middle East and Africa',
            'display_order' => 2,
        ]);

        Region::create([
            'code' => 'LAC',
            'name' => 'Latin America & the Caribbean',
            'display_order' => 3,
        ]);

        Region::create([
            'code' => 'APAC',
            'name' => 'Asia Pacific',
            'display_order' => 4,
        ]);
    }
}
