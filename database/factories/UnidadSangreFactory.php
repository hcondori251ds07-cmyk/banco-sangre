<?php

namespace Database\Factories;

use App\Models\UnidadSangre;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Donacion;
/**
 * @extends Factory<UnidadSangre>
 */
class UnidadSangreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'donacion_id' => Donacion::factory(),
            'numero_unidad' => 'UNI-' . fake()->unique()->numerify('######'),
            'grupo_sanguineo' => fake()->randomElement(['O+', 'O-', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-']),
            'fecha_vencimiento' => now()->addDays(35)->toDateString(),
            'estado' => 'en_analisis',
            'motivo_descarte' => null,
            'analizado_por' => null,
            'fecha_analisis' => null,
        ];
    }
    public function disponible(): static
    {
        return $this->state(fn () => [
            'estado' => 'disponible',
            'fecha_analisis' => now()->subDay(),
        ]);
    }
}
