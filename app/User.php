<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function trips() {
        return $this->hasMany(Trip::class);
    }

    public function follows() {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'followed_id');
    }
    public function followers() {
        return $this->belongsToMany(User::class, 'followers', 'followed_id', 'user_id');
    }
    public function socialProfiles() {
        return $this->hasMany(SocialProfile::class);
    }
    public function isFollowing(User $user) {
        return $this->follows->contains($user);
    }
}
