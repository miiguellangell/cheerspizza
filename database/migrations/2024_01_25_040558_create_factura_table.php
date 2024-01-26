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
       Schema::create('factura', function (Blueprint $table) {
            $table->id();     
            $table->string('NumeroDeFactura');
            $table->String('IdCliente');
            $table->string('NombreDeCliente');
            $table->date('FechaDeCarga');
            $table->integer('ProductoPeq')->default(0);
            $table->integer('ProductoMed')->default(0);
            $table->integer('ProductoGra')->default(0);
            $table->integer('PuntosDeFactura')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factura');
    }
};
