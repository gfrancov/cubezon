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
        Schema::create('productes', function (Blueprint $table) {
            $table->id();
            $table->string('NomProducte');
            $table->text('Descripcio')->nullable();
            $table->string('Icona')->nullable();
            $table->unsignedBigInteger('CategoriaID')->default(1);
            $table->unsignedBigInteger('BotigaID');
            $table->decimal('Preu', 8, 2);
            $table->dateTime('DataCreacio');
            $table->integer('Estoc');
            $table->enum('Estat', ['Disponible', 'No Disponible'])->default('Disponible');
            $table->foreign('CategoriaID')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreign('BotigaID')->references('id')->on('botigas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productes');
    }
};
