<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AccessType;

class AccessTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        AccessType::factory()->create([
            'code' => 'A',
            'name' => 'Cliente Final',
            'display_order' => 1,
        ]);

        AccessType::factory()->create([
            'code' => 'B',
            'name' => 'Agencia',
            'display_order' => 2,
        ]);

        AccessType::factory()->create([
            'code' => 'C',
            'name' => 'Corporativo',
            'display_order' => 3,
        ]);
    }
}

