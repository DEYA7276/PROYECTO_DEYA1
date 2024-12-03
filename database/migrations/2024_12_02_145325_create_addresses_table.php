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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('street', 60)->nullable();
            $table->integer('internal_num')->unsigned()->nullable()->default(12);
            $table->integer('external_num')->unsigned()->nullable()->default(12);
            $table->string('neighborhood', 60)->nullable();
            $table->string('town', 60)->nullable();
            $table->string('state', 60)->nullable();
            $table->string('country', 60)->nullable();
            $table->integer('postal_code')->nullable()->default(12);
            $table->string('references', 100)->nullable();
            $table->foreignId('client_id')->nullable(); // Mantener la relación con el cliente
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
