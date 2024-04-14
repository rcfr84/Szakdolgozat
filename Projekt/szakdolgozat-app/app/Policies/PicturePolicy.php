<?php

namespace App\Policies;

use App\Models\User;
use App\Helpers\PolicyHelper;
use App\Models\Advertisement;
use App\Models\Picture;

class PicturePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function create(User $user, Advertisement $advertisement)
    {
        return PolicyHelper::isUserOwner($user, $advertisement);
    }
    
    public function store(User $user, Advertisement $advertisement)
    {
        return PolicyHelper::isUserOwner($user, $advertisement);
    }

    public function destroy(User $user, Picture $picture)
    {
        return PolicyHelper::canDeletePicture($user, $picture);
    }

    public function index(User $user, Advertisement $advertisement)
    {
        return PolicyHelper::isUserOwner($user, $advertisement) || PolicyHelper::isAdmin($user);
    }
}
