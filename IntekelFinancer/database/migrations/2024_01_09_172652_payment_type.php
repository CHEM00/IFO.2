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
        Schema::create('payment_types', function (Blueprint $table) {
            $table->id();
            $table->string('payment_type_code') -> unique();
            $table->string('payment_type_description');
            $table -> string ('banked');
            $table -> string ('operation_number');
            $table -> string ('transmitter_rfc');
            $table -> string ('order_account');
            $table -> string ('template_patying_account');
            $table -> string ('rfc_issuer_beneficiary_account');
            $table -> string ('beneficiary_account');
            $table -> string ('template_beneficiary_account');
            $table -> string ('type_pay_chain');
            $table -> string ('name_issuing_bank_originating');
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_types');
    }
};
