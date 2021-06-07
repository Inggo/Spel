<?php

namespace Inggo\Spel\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Inggo\Spel\Models\User;
use Inggo\Spel\Models\Role;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \Inggo\Spel\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \Inggo\Spel\Models\User  $user
     * @param  \Inggo\Spel\Models\User  $model
     * @return mixed
     */
    public function view(User $user, User $model)
    {
        return $model->id === $user->id || $user->isAdmin();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \Inggo\Spel\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \Inggo\Spel\Models\User  $user
     * @param  \Inggo\Spel\Models\User  $model
     * @return mixed
     */
    public function update(User $user, User $model)
    {
        return $model->id === $user->id || $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \Inggo\Spel\Models\User  $user
     * @param  \Inggo\Spel\Models\User  $model
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        return $model->id === $user->id || $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \Inggo\Spel\Models\User  $user
     * @param  \Inggo\Spel\Models\User  $model
     * @return mixed
     */
    public function restore(User $user, User $model)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \Inggo\Spel\Models\User  $user
     * @param  \Inggo\Spel\Models\User  $model
     * @return mixed
     */
    public function forceDelete(User $user, User $model)
    {
        return $user->isAdmin();
    }
}
