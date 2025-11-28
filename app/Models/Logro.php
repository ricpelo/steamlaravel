<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Logro extends Model
{
    protected $fillable = [
        'descripcion',
        'videojuego_id',
    ];

    public function videojuego(): BelongsTo
    {
        return $this->belongsTo(Videojuego::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
