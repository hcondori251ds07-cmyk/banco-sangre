<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'solicitante',
        'tipo_solicitante',
        'grupo_sanguineo',
        'cantidad_solicitada',
        'urgencia',
        'estado',
        'registrado_por',
        'recibido_por',
        'fecha_entrega',
        'motivo_anulacion',
        'anulado_por',
    ];

    protected function casts(): array
    {
        return [
            'fecha_entrega' => 'datetime',
        ];
    }

    public function registradoPor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'registrado_por');
    }

    public function anuladoPor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'anulado_por');
    }

    public function unidadesSangre(): BelongsToMany
    {
        return $this->belongsToMany(UnidadSangre::class, 'pedido_unidad')
            ->withTimestamps();
    }
}