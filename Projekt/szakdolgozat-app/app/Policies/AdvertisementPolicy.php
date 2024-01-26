<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Advertisement;

class AdvertisementPolicy
{
    public function update(User $user, Advertisement $advertisement)
    {
        return $user->user_id === $advertisement->user_id;
    }

    public function delete(User $user, Advertisement $advertisement)
    {
        return $user->user_id === $advertisement->user_id;
    }
}
