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
            $table->string('name');
            $table->string('tax_regime');
            $table->string('email');
            $table->string('rfc');
            $table->string('phone');
            $table->string('address');
            $table->string('township');
            $table->string('state');
            $table->string('postal_code');
            $table->string('country');
            $table->string('payment_type');
            $table->string('method_payment');
            $table->string('cdfi');
            $table->string('credit_days');
            $table->string('bank');
            $table->string('clabe');
            $table->timestamps();
            /* only if you want to use soft deletes
            $table->softDeletes();
            */
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
