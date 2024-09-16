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
        Schema::create('ressenyas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ProducteID')->constrained('productes')->onDelete('cascade');
            $table->string('AdreçaIP');
            $table->string('Nom');
            $table->integer('Valoracio');
            $table->text('Comentari')->nullable();
            $table->dateTime('DataRessenya');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ressenyas');
    }
};
