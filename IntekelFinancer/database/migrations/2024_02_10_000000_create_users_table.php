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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            //personal data
            $table->string('social_reason') -> nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table -> string('phone') -> nullable();
            $table -> string('rfc') -> nullable();
            $table -> string('logo') -> nullable();
            //__________________________________________________________________//
            //Data of the person in charge
            $table->timestamp('email_verified_at')->nullable();
            $table->string('qb_token')->nullable();
            $table->string('qb_refresh_token')->nullable();
            $table->string(column: 'hour_zone')->nullable();
            $table->rememberToken();
            $table->timestamps();
            //__________________________________________________________________//
            //Data of the address
            $table -> string('postal_code') -> nullable();
            $table -> foreign('postal_code') -> references('postal_code') -> on('postal_codes');
            $table -> string('colony_name') -> nullable();
            $table -> foreign(['colony_name', 'postal_code']) -> references(['colony_name', 'postal_code']) -> on('colonies');
            $table -> string('township_code') -> nullable();
            $table -> foreign(['township_code', 'state_code']) -> references(['township_code', 'state_code']) -> on('townships');
            $table -> string('state_code') -> nullable();
            $table -> foreign('state_code') -> references('state_code') -> on('states');
            $table -> string('locality_code') -> nullable();
            $table -> foreign(['locality_code', 'state_code']) -> references(['locality_code', 'state_code']) -> on('localities');
            $table -> string('country_code') -> nullable();
            $table -> foreign('country_code') -> references('country_code') -> on('countries');
            //__________________________________________________________________//
            //Data of the street
            $table -> string('address') -> nullable();
            //__________________________________________________________________//
            //Data of the tax regime
            $table -> unsignedBigInteger('tax_regime_id') -> nullable();
            $table -> foreign('tax_regime_id') -> references('id') -> on('tax_regimes');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
