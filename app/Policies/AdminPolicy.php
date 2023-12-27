<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function create(User $user) : Response
    {
        /*
         * Check if the user is allowed to create admin
         */
        if ($user->roles->isEmpty())
        {
            return Response::deny("Vous n'avez pas l'autorisation de créer des administrateurs");
        }

        //Checking about his roles
        $roles = collect($user->roles)
            ->map(static function (Role $role) {
                return $role->name;
            });

        if ($roles->contains("sudo")) {
            return Response::allow();
        }

        return Response::deny();
    }
}
