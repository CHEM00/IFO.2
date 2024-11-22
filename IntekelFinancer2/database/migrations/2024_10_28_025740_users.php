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
            $table -> string ('qb_refresh_token') -> nullable ();
            $table -> string ('social_reason') -> nullable ();
            $table -> string ('tax_regime') -> nullable ();
            $table -> string ('hour_zone') -> nullable ();
            $table -> string ('address') -> nullable ();
            $table -> string ('phone') -> nullable ();
            $table -> string ('state') -> nullable ();
            $table -> string ('township') -> nullable ();
            $table -> string ('country') -> nullable ();
            $table -> string ('postal_code') -> nullable ();
            $table -> string ('rfc') -> unique () -> nullable ();
            $table -> string ('logo') -> nullable ();
            $table -> tinyInteger ('role') -> nullable ();
            $table -> rememberToken ();
            $table -> timestamps ();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
