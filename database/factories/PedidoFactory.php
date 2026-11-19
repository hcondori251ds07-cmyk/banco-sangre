<?php

namespace Database\Factories;

use App\Models\Pedido;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends Factory<Pedido>
 */
class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'solicitante' => fake()->randomElement([
                'Servicio de Emergencia',
                'Sala de Operaciones - Cirugía',
                'Servicio de Maternidad',
                'Centro de Salud San Jerónimo',
            ]),
            'tipo_solicitante' => fake()->randomElement(['servicio_hospital', 'centro_salud', 'paciente']),
            'grupo_sanguineo' => fake()->randomElement(['O+', 'O-', 'A+', 'B+']),
            'cantidad_solicitada' => fake()->numberBetween(1, 3),
            'urgencia' => fake()->randomElement(['normal', 'urgente']),
            'estado' => 'pendiente',
            'registrado_por' => User::factory(),
        ];
    }
}
