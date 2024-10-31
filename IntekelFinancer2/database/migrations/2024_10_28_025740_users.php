<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user', function (Blueprint $table){
            $table -> id ();
            $table -> string ('email') -> unique ();
            $table -> string ('password') -> required ();
            $table -> string ('qb_token') -> nullable ();
            $table -> string ('social_reason') -> nullable ();
            $table -> string ('address') -> nullable ();
            $table -> string ('phone') -> nullable ();
            $table -> string ('city') -> nullable ();
            $table -> string ('state') -> nullable ();
            $table -> string ('country') -> nullable ();
            $table -> string ('postal_code') -> nullable ();
            $table -> string ('rfc') -> unique () -> nullable ();
            $table -> string ('sat_key') -> unique () -> nullable ();
            $table -> string ('sat_cer') -> unique () -> nullable ();
            $table -> timestamps ();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
