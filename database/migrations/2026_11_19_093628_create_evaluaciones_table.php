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
        Schema::create('evaluaciones', function (Blueprint $table) {
            $table->id();
        $table->foreignId('donante_id')->constrained('donantes')->restrictOnDelete();
        $table->foreignId('user_id')->constrained('users')->restrictOnDelete();
        $table->dateTime('fecha_hora');
        $table->decimal('peso', 5, 2);
        $table->unsignedSmallInteger('presion_sistolica');
        $table->unsignedSmallInteger('presion_diastolica');
        $table->decimal('hemoglobina', 4, 1);
        $table->text('antecedentes')->nullable();
        $table->boolean('tatuajes_perforaciones')->default(false);
        $table->boolean('apto');
        $table->string('motivo_rechazo', 255)->nullable();
        $table->timestamps();

        $table->index(['donante_id', 'fecha_hora']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluaciones');
    }
};
