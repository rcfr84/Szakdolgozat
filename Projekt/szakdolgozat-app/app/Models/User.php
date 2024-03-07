<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function advertisements()
    {
        return $this->hasMany(Advertisement::class, 'user_id', 'user_id');
    }

    public function send_messages()
    {
        return $this->hasMany(Message::class, 'sender_id', 'user_id');
    }

    public function received_messages()
    {
        return $this->hasMany(Message::class, 'receiver_id', 'user_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }
    
    public function getLastMessage()
    {
        return Message::where('sender_id', $this->sender_id)
            ->orWhere('receiver_id', $this->receiver_id)->orderBy('created_at', 'desc')->first();
    }
}
