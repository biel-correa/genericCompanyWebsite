<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tasksCreated()
    {
        return $this->hasMany(Tasks::class, 'requester_id', 'id');
    }

    public function tasksAssined() {
        return $this->hasMany(Tasks::class, 'user_assigned_id', 'id');
    }
}
