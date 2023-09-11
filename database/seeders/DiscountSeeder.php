<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Discount;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Discount::create([
            'name' => 'Descuento de ejemplo',
            'start_date' => now(),
            'end_date' => now()->addDays(30),
            'priority' => 1,
            'active' => true,
            'region_id' => 1, // Reemplaza con el ID de la región deseada
            'brand_id' => 1, // Reemplaza con el ID de la marca deseada
            'access_type_code' => 'A', // Reemplaza con el código de tipo de acceso deseado
        ]);
    }
}
