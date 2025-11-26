<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Editora extends Model
{
    protected $fillable = ['nombre'];

    public function desarrolladoras(): HasMany
    {
        return $this->hasMany(Desarrolladora::class);
    }

    public function videojuegos(): HasManyThrough
    {
        return $this->hasManyThrough(Videojuego::class, Desarrolladora::class);
    }
}
