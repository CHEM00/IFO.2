<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('zipItems', function (Blueprint $table){
            $table -> string ('c_ProdServ') -> unique();
            $table -> string ('descripcion') -> notnullable();
            $table -> string ('ivaTraslado');
            $table -> string ('iepsTraslado');
            $table -> string ('complemento');
            $table -> string ('estimuloFranjaFronteriza') -> notnullable();
            $table -> string ('palabrasSimilares') -> notnullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('zipItems');
    }
};
