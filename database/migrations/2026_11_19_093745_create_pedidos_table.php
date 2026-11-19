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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
        $table->string('solicitante', 150);
        $table->enum('tipo_solicitante', ['servicio_hospital', 'centro_salud', 'paciente']);
        $table->enum('grupo_sanguineo', ['O+', 'O-', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-']);
        $table->unsignedSmallInteger('cantidad_solicitada');
        $table->enum('urgencia', ['normal', 'urgente'])->default('normal');
        $table->enum('estado', ['pendiente', 'atendido', 'atendido_parcial', 'anulado'])
              ->default('pendiente');
        $table->foreignId('registrado_por')->constrained('users')->restrictOnDelete();
        $table->string('recibido_por', 120)->nullable();
        $table->dateTime('fecha_entrega')->nullable();
        $table->string('motivo_anulacion', 255)->nullable();
        $table->foreignId('anulado_por')->nullable()->constrained('users')->nullOnDelete();
        $table->timestamps();

        $table->index(['estado', 'urgencia']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
