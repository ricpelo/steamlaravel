<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Editora extends Model
{
    protected $fillable = ['nombre'];

    public function desarrolladoras(): HasMany
    {
        return $this->hasMany(Desarrolladora::class);
    }
}
