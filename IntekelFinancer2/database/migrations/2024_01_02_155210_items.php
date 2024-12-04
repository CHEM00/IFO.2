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
        Schema::create('items', function (Blueprint $table) {
            $table ->  id();
            $table -> string ('description') -> notnullable();
            $table -> string ('value_unit') -> notnullable();
            $table -> string ('tax_rate') -> notnullable();
            $table -> string ('unit_measure') -> notnullable();
            $table -> timestamps();

            $table->string('c_ProdServ');

            $table->foreign('c_ProdServ')
            ->references('c_ProdServ')
            ->on('zipItems')   
            ->onDelete('cascade');

            $table -> foreignId('user_id') -> constrained('users') -> onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
