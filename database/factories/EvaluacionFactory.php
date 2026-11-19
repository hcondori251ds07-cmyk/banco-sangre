<?php

namespace Database\Factories;

use App\Models\Evaluacion;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Donante;
use App\Models\User;
/**
 * @extends Factory<Evaluacion>
 */
class EvaluacionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'donante_id' => Donante::factory(),
            'user_id' => User::factory(),
            'fecha_hora' => fake()->dateTimeBetween('-6 months', 'now'),
            'peso' => fake()->randomFloat(2, 54, 88),
            'presion_sistolica' => fake()->numberBetween(110, 128),
            'presion_diastolica' => fake()->numberBetween(70, 84),
            'hemoglobina' => fake()->randomFloat(1, 13.6, 16.5),
            'antecedentes' => 'Sin antecedentes patológicos de riesgo.',
            'tatuajes_perforaciones' => false,
            'apto' => true,
            'motivo_rechazo' => null,
        ];
    }

    public function noApta(string $motivo = 'Hemoglobina por debajo del mínimo permitido (RN04)'): static
    {
        return $this->state(fn () => [
            'hemoglobina' => 11.4,
            'apto' => false,
            'motivo_rechazo' => $motivo,
        ]);
    }
}