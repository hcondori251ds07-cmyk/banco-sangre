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
        Schema::create('pedido_unidad', function (Blueprint $table) {
           $table->id();
        $table->foreignId('pedido_id')->constrained('pedidos')->restrictOnDelete();
        $table->foreignId('unidad_sangre_id')->unique()->constrained('unidades_sangre')->restrictOnDelete();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedido_unidad');
    }
};
