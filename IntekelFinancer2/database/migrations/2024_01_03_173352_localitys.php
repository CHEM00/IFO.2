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
        Schema::create('localitys', function (Blueprint $table){
            $table -> string ('c_Locality');
            $table -> string ('c_State');
            $table -> string ('description') -> notnullable();

            $table->primary(['c_Locality', 'c_State']);

            
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('localitys');
        Schema::enableForeignKeyConstraints();
    }
};
