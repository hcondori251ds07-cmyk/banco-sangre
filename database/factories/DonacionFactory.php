<?php

namespace Database\Factories;

use App\Models\Donacion;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Donante;
use App\Models\Evaluacion;
use App\Models\User;
/**
 * @extends Factory<Donacion>
 */
class DonacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'donante_id' => Donante::factory(),
            'evaluacion_id' => Evaluacion::factory(),
            'user_id' => User::factory(),
            'fecha_donacion' => now()->toDateString(),
            'tipo' => fake()->randomElement(['voluntaria', 'paciente']),
            'numero_bolsa' => 'BOL-' . fake()->unique()->numerify('######'),
            'anulada' => false,
            'motivo_anulacion' => null,
            'anulada_por' => null,
            'fecha_anulacion' => null,
        ];
    }
}
