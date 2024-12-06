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
        Schema::create('materialy_kanalizacyjne', function (Blueprint $table) {
            $table->id();
            $table->string('Nazwa')->nullable();
            $table->integer('Stan')->nullable();
            $table->string('Jednostka')->nullable();
            $table->string('Uwagi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Schema::dropIfExists('cache');
    }
};
