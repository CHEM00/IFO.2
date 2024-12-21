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
        Schema::create('taxregimes', function (Blueprint $table){
            $table -> string ('c_TaxRegime') -> unique();
            $table -> string ('description') -> notnullable();
            $table -> string ('physics') -> notnullable();
            $table -> string ('moral') -> notnullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('tax_regimes');
        Schema::enableForeignKeyConstraints();
    }
};
