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
        Schema::table('comandas', function (Blueprint $table) {
            $table->enum('EstatComanda', ['Pendent', 'Confirmat', 'Lliurat', 'Cancel·lat'])->default('Pendent')->change();
            $table->string('Ubicacio')->default('Barcelona');
            $table->string('Empresa')->default('Pendent assignació');
            $table->integer('Pagat')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comandas', function (Blueprint $table) {
            //
        });
    }
};
