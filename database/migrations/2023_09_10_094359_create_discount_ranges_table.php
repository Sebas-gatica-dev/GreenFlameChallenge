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
        Schema::create('discount_ranges', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('from_days');
            $table->unsignedInteger('to_days');
            $table->double('discount')->nullable();
            $table->string('code', 15)->nullable();
            $table->unsignedBigInteger('discount_id');
            $table->timestamps();

            $table->foreign('discount_id')->references('id')->on('discounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discount_ranges');
    }
};
