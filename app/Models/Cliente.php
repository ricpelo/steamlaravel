<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cliente extends Model
{
    protected $fillable = [
        'dni',
        'nombre',
        'apellidos',
        'direccion',
        'codpostal',
        'telefono',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);

        /*
        Vuelo::withCount('reservas')
            ->where('salida', '>', now())
            ->having('count_reservas', '<', 'plazas')
            ->get();

        SELECT vuelos.*, COUNT(*) AS count_reservas
        FROM vuelos JOIN reservas ON reservas.vuelo_id = vuelos.id
        WHERE salida > CURRENT_DATE
        GROUP BY vuelos.*
        HAVING COUNT(*) < plazas;

        $c = collect()->range(1, $v->plazas)->diff($v->reservas()->pluck('asiento'));

        SELECT asiento
        FROM reservas
        WHERE vuelo_id = 5;
        */
    }
}
