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
        Schema::dropIfExists('users');
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('users', function (Blueprint $table){
            $table -> bigIncrements ('id');
            $table -> string ('email') -> unique ();
            $table -> timestamp('email_verified_at') -> nullable ();
            $table -> string ('password');
            $table -> string ('qb_token') -> nullable ();
            $table -> string ('qb_refresh_token') -> nullable ();
            $table -> string ('social_reason') -> nullable ();
            $table -> string ('hour_zone') -> nullable ();
            $table -> string ('phone') -> nullable ();
            $table -> string ('rfc') -> unique () -> nullable ();
            $table -> string ('logo') -> nullable ();
            $table -> rememberToken ();
            $table -> timestamps ();
            
            //Datos de la dirección del usuario
            $table -> string ('c_State') -> nullable ();
            $table -> foreign ('c_State') -> references ('c_State') -> on('states') -> onDelete('cascade');
            $table -> string ('c_Township') -> nullable ();
            $table -> foreign ('c_Township') -> references ('c_Township') -> on('townships') -> onDelete('cascade');
            $table -> string ('c_Locality') -> nullable ();
            $table -> foreign ('c_Locality') -> references ('c_Locality') -> on('localitys') -> onDelete('cascade');
            $table -> string ('c_Country') -> nullable ();
            $table -> foreign ('c_Country') -> references ('c_Country') -> on('countrys') -> onDelete('cascade');
            $table -> string ('c_Colony') -> nullable ();
            $table -> foreign ('c_Colony') -> references ('c_Colony') -> on('colonys') -> onDelete('cascade');
            $table -> string ('address') -> nullable ();

            $table -> string ('c_PostalCode') -> nullable ();
            $table -> foreign ('c_PostalCode') -> references ('c_PostalCode') -> on('postalCodes') -> onDelete('cascade'); 
            $table -> string ('c_TaxRegime') -> nullable ();
            $table -> foreign ('c_TaxRegime') -> references ('c_TaxRegime') -> on('taxregimes') -> onDelete('cascade');
            
        });
    }
};
