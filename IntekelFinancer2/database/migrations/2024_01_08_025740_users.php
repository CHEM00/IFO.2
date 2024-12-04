<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table){
            $table -> bigIncrements ('id');
            $table -> string ('email') -> unique ();
            $table -> timestamp('email_verified_at') -> nullable ();
            $table -> string ('password');
            $table -> string ('qb_token') -> nullable ();
            $table -> string ('social_reason') -> nullable ();
            $table -> string ('hour_zone') -> default ('UTC');
            $table -> string ('address') -> nullable ();
            $table -> string ('phone') -> nullable ();
            $table -> string ('state') -> nullable ();
            $table -> string ('township') -> nullable ();
            $table -> string ('locality') -> nullable ();
            $table -> string ('country') -> nullable ();
            $table -> string ('c_Colony') -> nullable ();
            $table -> string ('rfc') -> unique () -> nullable ();
            $table -> string ('logo') -> nullable ();
            $table -> rememberToken ();
            $table -> timestamps ();
            
            $table -> string ('c_PostalCode') -> nullable ();
            $table -> foreign ('c_PostalCode') -> references ('c_PostalCode') -> on('postalCodes') -> onDelete('cascade'); 
            $table -> string ('c_TaxRegime') -> nullable ();
            $table -> foreign ('c_TaxRegime') -> references ('c_TaxRegime') -> on('tax_regimes') -> onDelete('cascade');
            $table -> foreign ([ 'c_Colony', 'c_PostalCode' ]) -> references ([ 'c_colony', 'c_PostalCode' ]) -> on('colonys') -> onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('users');
        Schema::enableForeignKeyConstraints();
    }
};
