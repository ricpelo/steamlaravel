<?php

namespace App\Policies;

use App\Models\Plataforma;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PlataformaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Plataforma $plataforma): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->name == 'admin';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Plataforma $plataforma): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Plataforma $plataforma): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Plataforma $plataforma): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Plataforma $plataforma): bool
    {
        return false;
    }
}
