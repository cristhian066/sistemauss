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
        Schema::create('entradas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('vehiculo_id'); // Agregamos la columna vehiculo_id
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos')->onDelete('CASCADE'); // Relación con vehiculos
            $table->date('fecha');
            $table->timestamps(); // Esto agrega created_at y updated_at automáticamente
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entradas');
    }
};
