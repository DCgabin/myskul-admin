<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class AbonnementPolicy
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

    public function destroy(User $user)
    {
        /*
         * Check if the user is allowed to create admin
         */
        if ($user->roles()
            ->where('name', '=', 'sudo')
            ->orWhere('name', '=', 'admin')
            ->get()
            ->isEmpty())
        {
            return Response::deny("Vous n'avez pas l'autorisation de supprimer des abonnements.");
        }

        return Response::allow();
    }

}
