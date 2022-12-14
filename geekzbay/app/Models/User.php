<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profilePicture',
        'birthDate',
        'desc',
        'discord_id'
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
    ];

    public function buddies()
    {
        return $this->hasManyThrough(self::class, UserBuddies::class, 'user_id', 'id', 'id', 'buddy_id');
    }
    
    public function communities(){
        return $this->belongsToMany(Community::class, 'users_in_communities', 'user_id', 'community_id');
    }
    public function locations(){
        return $this->belongsToMany(Location::class, 'location_user');
    }
}
