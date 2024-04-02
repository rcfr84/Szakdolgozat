<?php

namespace App\Policies;

use App\Models\User;
use App\Helpers\PolicyHelper;
use App\Models\Message;

class MessagePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function showConversation(User $user, $user1_id, $user2_id)
    {
        return PolicyHelper::showConversation($user, $user1_id, $user2_id);
    }
    
    public function edit(User $user, Message $message)
    {
        return $user->user_id === $message->sender_id;
    }

    public function update(User $user, Message $message)
    {
        return $user->user_id === $message->sender_id;
    }

    public function destroy(User $user, Message $message)
    {
        return $user->user_id === $message->sender_id;
    }

}
