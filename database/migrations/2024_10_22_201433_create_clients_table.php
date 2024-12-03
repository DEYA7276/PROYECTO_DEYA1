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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();

            $table->string('name',40)->nullable()->default('nombre');
            $table->string('last_name',40)->nullable()->default('apellido_paterno');
            $table->string('second_last_name',40)->nullable()->default('apellido_materno');
            $table->string('email',50)->nullable()->default('email@gmail.com');
            $table->bigInteger('phone')->nullable()->default(1234567890);
         //  $table->string('state',40)->nullable()->default('Veracruz');
           
           //$table->string('town',40)->nullable()->default('Gtz. Zamora');
            

            $table->timestamps();
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
