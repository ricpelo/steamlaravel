<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Desarrolladora extends Model
{
    protected $fillable = ['denominacion'];

    public function videojuegos(): HasMany
    {
        return $this->hasMany(Videojuego::class);
    }
}
