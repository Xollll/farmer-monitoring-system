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
        Schema::create('water_quality', function (Blueprint $table) {
            $table->id();
            $table->float('moisture_level'); // Store the soil moisture level in percentage
            $table->timestamps(); // Store time information (for trends over time)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('water_quality');
    }
};
