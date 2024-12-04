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
        Schema::create('clients', function (Blueprint $table){
            $table -> bigIncrements ('id');
            $table->string('name') -> notnullable(); //nombre o razón social
            $table->string('email') -> unique() -> notNullable();
            $table->string('rfc') -> unique() -> notNullable();
            $table->string('phone') -> unique() -> notNullable();
            $table->string('address') -> notNullable();
            $table->string('exterior_number') -> notNullable();
            $table->string('interior_number') -> notNullable();
            $table->string('locality') -> notNullable();
            $table->string('township') -> notNullable();
            $table->string('state') -> notNullable();
            $table->string('country')-> notNullable();
            $table->string('credit_days');
            $table->string('bank');
            $table->string('clabe');
            $table->timestamps();
            /* only if you want to use soft deletes
            $table->softDeletes();
            */
            $table -> string ('c_PostalCode') -> notnullable();
            $table -> foreign('c_PostalCode') -> references('c_PostalCode') -> on('postalCodes') -> onDelete('cascade');

            $table -> string ('c_TaxRegime') -> notnullable();
            $table -> foreign('c_TaxRegime') -> references('c_TaxRegime') -> on('tax_regimes') -> onDelete('cascade');

            $table -> foreignId('id_user') -> constrained('users') -> onDelete('cascade');
            
            $table -> string ('c_MethodPayment') -> notnullable();
            $table -> foreign('c_MethodPayment') -> references('c_MethodPayment') -> on('method_payments') -> onDelete('cascade');
            
            $table -> string('c_TypePayment') -> notnullable();
            $table -> foreign('c_TypePayment') -> references('c_TypePayment') -> on('type_payments') -> onDelete('cascade');
            
            $table -> string('c_Cfdi') -> notnullable();
            $table -> foreign('c_Cfdi') -> references('c_Cfdi') -> on('cfdis') -> onDelete('cascade');
            
            $table->string('c_Colony') -> notNullable();
            $table -> foreign(['c_Colony', 'c_PostalCode']) -> references(['c_Colony', 'c_PostalCode']) -> on('colonys') -> onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('clients');
        Schema::enableForeignKeyConstraints();
    }
};
