<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Habitacion extends Model
{
    protected $table = 'habitaciones';

    protected $fillable = [
        'numero',
        'planta',
        'tipo',
        'precio_noche',
    ];

    public function reservas(): HasMany
    {
        return $this->hasMany(Reserva::class);
    }

    public function reservas_activas()
    {
        return $this->reservas()
            ->where('fecha_salida', '>', now())
            ->orderBy('fecha_entrada');
    }
}
