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
        Schema::create('townships', function (Blueprint $table){
            $table -> string ('c_Township');
            $table -> string ('description') -> notnullable();
            $table -> string ('c_State');

            $table->primary(['c_Township', 'c_State']);
            $table -> foreign('c_State') -> references('c_State') -> on('states');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('townships');
        Schema::enableForeignKeyConstraints();
    }
};
