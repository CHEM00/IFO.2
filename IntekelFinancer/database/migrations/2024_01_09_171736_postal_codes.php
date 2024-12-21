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
        Schema::create('postal_codes', function (Blueprint $table) {
            $table->id();
            $table->string('postal_code')-> unique();
            $table -> string('state_code');
            $table -> foreign('state_code') -> references('state_code') -> on('states');
            $table -> string('township_code');
            $table -> foreign(['township_code', 'state_code']) -> references(['township_code', 'state_code']) -> on('townships');
            $table -> string('locality_code');
            $table -> foreign(['locality_code', 'state_code']) -> references(['locality_code', 'state_code']) -> on('localities');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postal_codes');
    }
};
