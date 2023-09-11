<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DiscountRange;

class DiscountRangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DiscountRange::create([
            'from_days' => 1,
            'to_days' => 7,
            'discount' => 0.1,
            'code' => 'ABC123',
            'discount_id' => 1,
        ]);
    }
}
