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
        

            Schema::create('discounts', function (Blueprint $table) {
                $table->id();
                $table->string('name', 100);
                $table->datetime('start_date');
                $table->datetime('end_date');
                $table->unsignedInteger('priority')->default(0);
                $table->boolean('active')->default(false);
                $table->bigInteger('region_id')->unsigned();
                $table->bigInteger('brand_id')->unsigned();
                $table->char('access_type_code', 1);
                $table->timestamps();
                $table->softDeletes();
    
                $table->foreign('region_id')->references('id')->on('regions');
                $table->foreign('brand_id')->references('id')->on('brands');
                $table->foreign('access_type_code')->references('code')->on('access_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
