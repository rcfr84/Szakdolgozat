<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Category;
use App\Helpers\PolicyHelper;

class CategoryPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function create(User $user)
    {
        return PolicyHelper::isAdmin($user);
    }

    public function store(User $user)
    {
        return PolicyHelper::isAdmin($user);
    }

    public function edit(User $user)
    {
        return PolicyHelper::isAdmin($user);
    }

    public function update(User $user)
    {
        return PolicyHelper::isAdmin($user);
    }

    public function destroy(User $user)
    {
        return PolicyHelper::isAdmin($user);
    }

    public function action(User $user)
    {
        return PolicyHelper::isAdmin($user);
    }
}
