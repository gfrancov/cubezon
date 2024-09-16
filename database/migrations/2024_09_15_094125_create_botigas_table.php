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
        Schema::create('botigas', function (Blueprint $table) {
            $table->id();
            $table->string('NomBotiga')->unique();
            $table->text('Descripcio')->nullable();
            $table->string('Municipi');
            $table->string('Mapa');
            $table->string('Logo');
            $table->string('Imatge');
            $table->integer('Prime')->default(0);
            $table->foreignId('PropietariID')->constrained('users')->onDelete('cascade');
            $table->dateTime('DataCreacio');
            $table->enum('Estat', ['Actiu', 'Inactiu'])->default('Actiu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('botigas');
    }
};
