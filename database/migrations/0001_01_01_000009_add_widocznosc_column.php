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
        Schema::table('materialy_do_budowy_domow', function (Blueprint $table) {
            $table->string('Widocznosc')->nullable();
        });
        Schema::table('materialy_drogowe', function (Blueprint $table) {
            $table->string('Widocznosc')->nullable();
        });
        Schema::table('materialy_kanalizacyjne', function (Blueprint $table) {
            $table->string('Widocznosc')->nullable();
        });
        Schema::table('materialy_wodociagowe', function (Blueprint $table) {
            $table->string('Widocznosc')->nullable();
        });
        Schema::table('narzedzia', function (Blueprint $table) {
            $table->string('Widocznosc')->nullable();
        });
        Schema::table('sprzet', function (Blueprint $table) {
            $table->string('Widocznosc')->nullable();
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
