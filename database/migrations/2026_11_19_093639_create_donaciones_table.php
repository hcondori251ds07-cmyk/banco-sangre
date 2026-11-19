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
        Schema::create('donaciones', function (Blueprint $table) {
           $table->id();
        $table->foreignId('donante_id')->constrained('donantes')->restrictOnDelete();
        $table->foreignId('evaluacion_id')->unique()->constrained('evaluaciones')->restrictOnDelete();
        $table->foreignId('user_id')->constrained('users')->restrictOnDelete();
        $table->date('fecha_donacion');
        $table->enum('tipo', ['voluntaria', 'paciente']);
        $table->string('numero_bolsa', 20)->unique();
        $table->boolean('anulada')->default(false);
        $table->string('motivo_anulacion', 255)->nullable();
        $table->foreignId('anulada_por')->nullable()->constrained('users')->nullOnDelete();
        $table->dateTime('fecha_anulacion')->nullable();
        $table->timestamps();

        $table->index(['donante_id', 'fecha_donacion']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donaciones');
    }
};
