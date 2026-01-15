<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

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

    public function editora(): BelongsTo
    {
        return $this->desarrolladora->editora();
    }

    public function generos(): BelongsToMany
    {
        return $this->belongsToMany(Genero::class)
            ->withTimestamps()
            ->orderBy('genero');
    }

    public function logros(): HasMany
    {
        return $this->hasMany(Logro::class);
    }

    public function users(): MorphToMany
    {
        return $this->morphToMany(User::class, 'adquirible');
    }

    public function comentarios(): HasMany
    {
        return $this->hasMany(Comentario::class);
    }
}
