<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Videojuego extends Model
{
    protected $fillable = [
        'nombre',
        'precio',
        'lanzamiento',
        'desarrolladora_id',
    ];

    protected $casts = [
        'lanzamiento' => 'datetime',
    ];

    public function getLanzamientoFormateadoAttribute(): string
    {
        return fecha_larga($this->lanzamiento);
    }

    public function getPrecioFormateadoAttribute(): string
    {
        return dinero($this->precio);
    }

    public function desarrolladora(): BelongsTo
    {
        return $this->belongsTo(Desarrolladora::class);
    }
}
