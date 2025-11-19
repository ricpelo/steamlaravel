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

    public function desarrolladora(): BelongsTo
    {
        return $this->belongsTo(Desarrolladora::class);
    }
}
