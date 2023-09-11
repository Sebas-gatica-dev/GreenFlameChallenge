<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Brand::factory()->create([
            'id' => 1,
            'name' => 'Avis',
            'display_order' => 10,
            'active' => 1,
        ]);

        Brand::factory()->create([
            'id' => 2,
            'name' => 'Budget',
            'display_order' => 20,
            'active' => 1,
        ]);

        Brand::factory()->create([
            'id' => 3,
            'name' => 'Payless',
            'display_order' => 30,
            'active' => 1,
        ]);
    }
}
