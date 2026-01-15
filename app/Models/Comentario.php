<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = [
        'cuerpo',
        'user_id',
        'videojuego_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function videojuego()
    {
        return $this->belongsTo(Videojuego::class);
    }
}
