<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $guarded = ['id'];
    protected $hidden = [
        'password',
    ];

    public function role()
    {
        return $this->hasOneThrough(Role::class, UserRole::class, 'user_id', 'id', 'id', 'role_id');
    }

    public function permissions()
    {
        return $this->role->permissions->pluck('name');
    }

    public function hasAccess($access)
    {

        return $this->permissions()->contains($access);
    }

    public function isAdmin()
    {
        return $this->role_id === 1;
    }
    public function isEmployer():bool
    {
        return $this->role_id === 2;
    }

    public function isApplicant():bool
    {
        return $this->role_id === 3;
    }
}
