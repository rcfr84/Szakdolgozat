<?php
namespace App\Helpers;

use App\Models\User;
use App\Models\Advertisement;
use App\Models\Message;
use App\Models\Picture;

class PolicyHelper
{
    public static function isAdmin(User $user)
    {
        return $user->role->name === 'admin';
    }

    public static function isUserOwner(User $user, Advertisement $advertisement)
    {
        return $user->user_id === $advertisement->user_id;
    }
}
