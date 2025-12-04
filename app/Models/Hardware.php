<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Hardware extends Model
{
    protected $table = 'hardware';

    public function users(): MorphToMany
    {
        return $this->morphToMany(User::class, 'adquirible');
    }
}
