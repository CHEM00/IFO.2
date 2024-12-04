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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('colonys');
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('colonys', function (Blueprint $table){
            $table -> string ('c_Colony');
            $table -> string ('c_PostalCode');
            $table -> string ('settlementName') -> notnullable();

            $table -> primary(['c_Colony', 'c_PostalCode']);

            $table -> foreign('c_PostalCode') -> references('c_PostalCode') -> on('postalCodes');
        });
    }
};
