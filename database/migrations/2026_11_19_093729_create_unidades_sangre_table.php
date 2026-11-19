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
        Schema::create('unidades_sangre', function (Blueprint $table) {
            $table->id();
        $table->foreignId('donacion_id')->unique()->constrained('donaciones')->restrictOnDelete();
        $table->string('numero_unidad', 20)->unique();
        $table->enum('grupo_sanguineo', ['O+', 'O-', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-']);
        $table->date('fecha_vencimiento');
        $table->enum('estado', ['en_analisis', 'disponible', 'descartada', 'entregada', 'vencida'])
              ->default('en_analisis');
        $table->string('motivo_descarte', 255)->nullable();
        $table->foreignId('analizado_por')->nullable()->constrained('users')->nullOnDelete();
        $table->dateTime('fecha_analisis')->nullable();
        $table->timestamps();

        $table->index(['grupo_sanguineo', 'estado', 'fecha_vencimiento']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidades_sangre');
    }
};
