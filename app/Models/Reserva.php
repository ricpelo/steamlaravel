<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reserva extends Model
{
    protected $fillable = [
        'fecha_entrada',
        'fecha_salida',
        'habitacion_id',
    ];

    protected $casts = [
        'fecha_entrada' => 'date',
        'fecha_salida' => 'date',
    ];

    public function habitacion(): BelongsTo
    {
        return $this->belongsTo(Habitacion::class);
    }

    public function getFechaEntradaFormateadaAttribute(): string
    {
        return $this->fecha_entrada->format('d-m-Y');
    }

    public function getFechaSalidaFormateadaAttribute(): string
    {
        return $this->fecha_salida->format('d-m-Y');
    }

    public function getPrecioTotalFormateadoAttribute(): string
    {
        $salida = $this->fecha_salida;
        $entrada = $this->fecha_entrada;
        $diff = $salida->diff($entrada)->d;
        $precio_total = $diff * $this->habitacion->precio_noche;
        return dinero($precio_total);
    }
}
