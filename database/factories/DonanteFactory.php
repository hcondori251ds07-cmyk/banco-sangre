<?php

namespace Database\Factories;

use App\Models\Donante;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Donante>
 */
class DonanteFactory extends Factory
{
    public function definition(): array
    {
        return [
            'dni' => fake()->unique()->numerify('########'),
            'nombres' => fake()->firstName(),
            'apellidos' => fake()->lastName() . ' ' . fake()->lastName(),
            'fecha_nacimiento' => fake()->dateTimeBetween('-58 years', '-19 years')->format('Y-m-d'),
            'sexo' => fake()->randomElement(['M', 'F']),
            'grupo_sanguineo' => fake()->randomElement([
                'O+', 'O+', 'O+', 'A+', 'A+', 'B+', 'O-', 'A-', 'B-', 'AB+', 'AB-'
            ]),
            'telefono' => fake()->numerify('9########'),
            'direccion' => fake()->streetAddress(),
            'activo' => true,
        ];
    }

    public function dadoDeBaja(): static
    {
        return $this->state(fn () => ['activo' => false]);
    }
}