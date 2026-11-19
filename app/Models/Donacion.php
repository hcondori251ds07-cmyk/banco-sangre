<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Donacion extends Model
{
    use HasFactory;

    protected $table = 'donaciones';

    protected $fillable = [
        'donante_id',
        'evaluacion_id',
        'user_id',
        'fecha_donacion',
        'tipo',
        'numero_bolsa',
        'anulada',
        'motivo_anulacion',
        'anulada_por',
        'fecha_anulacion',
    ];

    protected function casts(): array
    {
        return [
            'fecha_donacion' => 'date',
            'anulada' => 'boolean',
            'fecha_anulacion' => 'datetime',
        ];
    }

    public function donante(): BelongsTo
    {
        return $this->belongsTo(Donante::class);
    }

    public function evaluacion(): BelongsTo
    {
        return $this->belongsTo(Evaluacion::class);
    }

    public function responsable(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function anuladaPor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'anulada_por');
    }

    public function unidadSangre(): HasOne
    {
        return $this->hasOne(UnidadSangre::class);
    }
}