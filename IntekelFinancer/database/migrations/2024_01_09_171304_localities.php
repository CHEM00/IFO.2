<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('localities', function (Blueprint $table) {
            $table->string('locality_code');
            $table->string('locality_name');
            $table->string('state_code');
            $table->foreign('state_code') -> references('state_code') -> on('states');
            
            $table -> primary(['locality_code', 'state_code']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('localities');
    }
};
