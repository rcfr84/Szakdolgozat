<?php

namespace App\Policies;

use App\Models\User;
use App\Helpers\PolicyHelper;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function index(User $user)
    {
        return PolicyHelper::isAdmin($user);
    }

    public function destroy(User $user)
    {
        return PolicyHelper::isAdmin($user);
    }

    public function searchByName(User $user)
    {
        return PolicyHelper::isAdmin($user);
    }
}
