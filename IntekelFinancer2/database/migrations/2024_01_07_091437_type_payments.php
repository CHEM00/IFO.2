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
        Schema::create('type_payments', function (Blueprint $table){
            $table->string('c_TypePayment')-> unique();
            $table->string('description')->notNullable();
            $table->string('banked')->notNullable();
            $table->string('operationNum')->notNullable();
            $table->string('emisorRfc')->notNullable();
            $table->string('orderAccount')->notNullable();
            $table->string('template_patyingAccount')->notNullable(); 
            $table->string('rfcIssuer_BeneficiaryAccount')->notNullable();
            $table->string('beneficiaryAccount')->notNullable();
            $table->string('template_BeneficiaryAccount')->notNullable();
            $table->string('type_PayChain')->notNullable();
            $table->string('nameIssuingBankOriginating')->notNullable(); //Nombre del banco emisor de la cuenta de origen en caso de ser extrajero
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('type_payments');
        Schema::enableForeignKeyConstraints();
    }
};
