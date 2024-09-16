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
        Schema::create('detall_comandas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ComandaID')->constrained('comandas')->onDelete('cascade');
            $table->foreignId('ProducteID')->constrained('productes')->onDelete('cascade');
            $table->integer('Quantitat');
            $table->decimal('PreuUnitari', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detall_comandas');
    }
};
