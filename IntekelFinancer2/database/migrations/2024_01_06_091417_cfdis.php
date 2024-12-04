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
        Schema::create('cfdis', function (Blueprint $table){
            $table -> string ('c_Cfdi') -> unique();
            $table -> string ('description') -> notnullable();
            $table -> string ('physics') -> notnullable();
            $table -> string ('moral') -> notnullable();
            $table -> string ('receiving_TaxRegime') -> notnullable();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('cfdis');
        Schema::enableForeignKeyConstraints();
    }
};
