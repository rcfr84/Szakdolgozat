<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Advertisement;
use App\Helpers\PolicyHelper;

class AdvertisementPolicy
{
    public function edit(User $user, Advertisement $advertisement)
    {
        return PolicyHelper::isUserOwner($user, $advertisement) || PolicyHelper::isAdmin($user);
    }
    public function update(User $user, Advertisement $advertisement)
    {
        return PolicyHelper::isUserOwner($user, $advertisement) || PolicyHelper::isAdmin($user);
    }

    public function destroy(User $user, Advertisement $advertisement)
    {
        return PolicyHelper::isUserOwner($user, $advertisement) || PolicyHelper::isAdmin($user);
    }

    public function editCountyAndCity(User $user, Advertisement $advertisement)
    {
        return PolicyHelper::isUserOwner($user, $advertisement);
    }

    public function updateCountyAndCity(User $user, Advertisement $advertisement)
    {
        return PolicyHelper::isUserOwner($user, $advertisement);
    }

    public function ownAdvertisement(User $user)
    {
        return !PolicyHelper::isAdmin($user);
    }

    public function create(User $user)
    {
        return !PolicyHelper::isAdmin($user);
    }

    public function store(User $user)
    {
        return !PolicyHelper::isAdmin($user);
    }
}
