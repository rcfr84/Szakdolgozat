<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';
    protected $primaryKey = 'message_id';

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'message',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id', 'user_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id', 'user_id');
    }

    public function getLastMessage()
    {
        return Message::where(function ($query) 
        {
            $query->where('sender_id', $this->sender_id)->where('receiver_id', $this->receiver_id);
        })
        ->orWhere(function ($query) 
        {
            $query->where('sender_id', $this->receiver_id)->where('receiver_id', $this->sender_id);
        })
        ->latest('created_at')->first();
    }
    
    public function scopeUserMessages($query, $user_id)
    {
        return $query->where(function($query) use ($user_id) 
        {
            $query->where('sender_id', $user_id)->orWhere('receiver_id', $user_id);
        });
    }

    public static function getConversation($user1_id, $user2_id)
    {
        return Message::where(function ($query) use ($user1_id, $user2_id) 
        {
            $query->where('sender_id', $user1_id)->where('receiver_id', $user2_id);
        })
        ->orWhere(function ($query) use ($user1_id, $user2_id) 
        {
            $query->where('sender_id', $user2_id)->where('receiver_id', $user1_id);
        })
        ->orderByDesc('created_at')->get();
    }

}
