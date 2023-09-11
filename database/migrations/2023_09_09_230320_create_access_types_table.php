<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('access_types', function (Blueprint $table) {
            $table->string('code', 1)->collation('utf8mb4_unicode_ci')->primary();
            $table->text('name')->collation('utf8mb4_unicode_ci');
            $table->unsignedBigInteger('display_order');
            // Puedes agregar más columnas si es necesario

            $table->timestamps(); // Si deseas agregar created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('access_types');
    }
};
