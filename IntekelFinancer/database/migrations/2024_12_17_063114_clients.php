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
        Schema::create('clients', function (Blueprint $table)
        {
            $table -> id();
            //simple information of the client
            //____________________________________________________________________________
            $table -> string ('name') -> notNullable(); // Name of the client o social reason
            $table -> string ('email') -> unique() -> notNullable();
            $table -> string ('rfc') -> unique() -> notNullable();
            $table -> string ('phone') -> notNullable();
            //____________________________________________________________________________
            //Address of the client
            //____________________________________________________________________________
            $table -> string ('postal_code') -> notNullable();
            $table -> foreign('postal_code') -> references('postal_code') -> on ('postal_codes');
            $table -> string ('country_code') -> notNullable();
            $table -> foreign('country_code') -> references('country_code') -> on ('countries');
            $table -> string ('state_code') -> notNullable();
            $table -> foreign('state_code') -> references('state_code') -> on ('states');
            $table -> string ('locality_code') -> notNullable();
            $table -> foreign(['locality_code', 'state_code']) -> references(['locality_code', 'state_code']) -> on ('localities');
            $table -> string ('colony_name') -> notNullable();
            $table -> foreign(['colony_name', 'postal_code']) -> references(['colony_name', 'postal_code']) -> on ('colonies');
            $table -> string ('township_code') -> notNullable();
            $table -> foreign(['township_code', 'state_code']) -> references(['township_code', 'state_code']) -> on ('townships');
            $table -> string ('address') -> notNullable();
            $table -> string ('interior_number') -> nullable();
            $table -> string ('exterior_number') -> nullable();
            //____________________________________________________________________________
            //fiscal data od the client
            //____________________________________________________________________________
            $table -> unsignedBigInteger ('cfdi_id') -> notNullable();
            $table -> foreign('cfdi_id') -> references('id') -> on ('cfdis');
            $table -> unsignedBigInteger('tax_regime_id') -> notNullable();
            $table -> foreign('tax_regime_id') -> references('id') -> on ('tax_regimes');
            $table -> unsignedBigInteger('payment_type_id') -> notNullable();
            $table -> foreign('payment_type_id') -> references('id') -> on ('payment_types');
            $table -> unsignedBigInteger('payment_method_id') -> notNullable();
            $table -> foreign('payment_method_id') -> references('id') -> on ('payment_methods');
            $table -> string('bank') -> notNullable();
            $table -> string ('credit_day') -> notNullable();
            $table -> string ('clabe') -> notNullable();
            //____________________________________________________________________________
            $table -> timestamps();
            //____________________________________________________________________________
            //relation with the user
            //____________________________________________________________________________
            $table -> unsignedBigInteger('user_id') -> notNullable();
            $table -> foreign('user_id') -> references('id') -> on ('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
        Schema::dropIfExists('clients');
    }
};
