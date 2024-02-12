<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Advertisement;

class AdvertisementPolicy
{
    public function edit(User $user, Advertisement $advertisement)
    {
        return $user->user_id === $advertisement->user_id || $user->role->name === 'admin';
    }
    public function update(User $user, Advertisement $advertisement)
    {
        return $user->user_id === $advertisement->user_id || $user->role->name === 'admin';
    }

    public function destroy(User $user, Advertisement $advertisement)
    {
        return $user->role->name === 'admin' || $user->user_id === $advertisement->user_id;
    }
}
