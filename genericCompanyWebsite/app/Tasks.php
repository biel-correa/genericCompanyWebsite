<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $fillable = [
        'name', 'description', 'requester_id', 'user_assigned_id'
    ];

    public function requester()
    {
        return $this->hasOne(User::class, 'id', 'requester_id');
    }

    public function assinedTo() {
        return $this->hasOne(User::class, 'id', 'user_assigned_id');
    }
}
