<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Role extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name'
    ];

    public function users() {
        return $this->hasMany(User::class, 'role_id', 'id');
    }
}
