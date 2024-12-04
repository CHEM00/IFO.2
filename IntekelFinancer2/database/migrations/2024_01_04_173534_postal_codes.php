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
        Schema::create('postalCodes', function (Blueprint $table){
            $table -> string ('c_PostalCode') -> unique();
            $table -> string ('c_State');
            $table -> string ('c_Township');
            $table -> string ('c_Locality');
            
            
            $table -> foreign('c_State') -> references('c_State') -> on('states') -> onDelete('cascade');
            $table -> foreign(['c_Locality', 'c_State']) -> references(['c_Locality', 'c_State']) -> on('localitys') -> onDelete('cascade');
            $table -> foreign(['c_Township', 'c_State']) -> references(['c_Township', 'c_State']) -> on('townships') -> onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('postalCodes');
        Schema::enableForeignKeyConstraints();    
    }
};
