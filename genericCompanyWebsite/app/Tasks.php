<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $fillable = [
        'name', 'description',
    ];

    public function requester()
    {
        return $this->hasOne(User::class, 'id', 'requester_id');
    }
}
