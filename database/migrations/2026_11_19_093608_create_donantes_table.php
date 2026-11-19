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
        Schema::create('donantes', function (Blueprint $table) {
          $table->id();
        $table->char('dni', 8)->unique();
        $table->string('nombres', 80);
        $table->string('apellidos', 80);
        $table->date('fecha_nacimiento');
        $table->enum('sexo', ['M', 'F']);
        $table->enum('grupo_sanguineo', ['O+', 'O-', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-']);
        $table->string('telefono', 9)->nullable();
        $table->string('direccion', 150)->nullable();
        $table->boolean('activo')->default(true);
        $table->timestamps();

        $table->index(['grupo_sanguineo', 'activo']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donantes');
    }
};
