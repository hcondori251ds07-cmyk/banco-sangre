<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Evaluacion extends Model
{
    use HasFactory;

    protected $table = 'evaluaciones';

    protected $fillable = [
        'donante_id',
        'user_id',
        'fecha_hora',
        'peso',
        'presion_sistolica',
        'presion_diastolica',
        'hemoglobina',
        'antecedentes',
        'tatuajes_perforaciones',
        'apto',
        'motivo_rechazo',
    ];

    protected function casts(): array
    {
        return [
            'fecha_hora' => 'datetime',
            'peso' => 'decimal:2',
            'hemoglobina' => 'decimal:1',
            'tatuajes_perforaciones' => 'boolean',
            'apto' => 'boolean',
        ];
    }

    public function donante(): BelongsTo
    {
        return $this->belongsTo(Donante::class);
    }

    public function evaluador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function donacion(): HasOne
    {
        return $this->hasOne(Donacion::class);
    }
}