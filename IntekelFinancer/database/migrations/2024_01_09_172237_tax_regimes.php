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
        Schema::create('tax_regimes', function (Blueprint $table) {
            $table->id();
            $table->string('tax_regime_code') -> unique();
            $table->string('tax_regime_description');
            $table -> string ('physical_person');
            $table -> string ('moral_person');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tax_regimes');
    }
};
