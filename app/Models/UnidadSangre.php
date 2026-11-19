<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class UnidadSangre extends Model
{
    use HasFactory;

    protected $table = 'unidades_sangre';

    protected $fillable = [
        'donacion_id',
        'numero_unidad',
        'grupo_sanguineo',
        'fecha_vencimiento',
        'estado',
        'motivo_descarte',
        'analizado_por',
        'fecha_analisis',
    ];

    protected function casts(): array
    {
        return [
            'fecha_vencimiento' => 'date',
            'fecha_analisis' => 'datetime',
        ];
    }

    public function donacion(): BelongsTo
    {
        return $this->belongsTo(Donacion::class);
    }

    public function analizadoPor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'analizado_por');
    }

    public function pedidos(): BelongsToMany
    {
        return $this->belongsToMany(Pedido::class, 'pedido_unidad')
            ->withTimestamps();
    }
}