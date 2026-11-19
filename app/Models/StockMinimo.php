<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockMinimo extends Model
{
    protected $table = 'stock_minimos';

    protected $fillable = [
        'grupo_sanguineo',
        'cantidad_minima',
    ];
}