<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Donante extends Model
{
    use HasFactory;

    protected $fillable = [
        'dni',
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'sexo',
        'grupo_sanguineo',
        'telefono',
        'direccion',
        'activo',
    ];

    protected function casts(): array
    {
        return [
            'fecha_nacimiento' => 'date',
            'activo' => 'boolean',
        ];
    }

    public function evaluaciones(): HasMany
    {
        return $this->hasMany(Evaluacion::class);
    }

    public function donaciones(): HasMany
    {
        return $this->hasMany(Donacion::class);
    }

    public function unidadesSangre(): HasManyThrough
    {
        return $this->hasManyThrough(UnidadSangre::class, Donacion::class);
    }
}