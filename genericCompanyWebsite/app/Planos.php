<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planos extends Model
{
    protected $fillable = [
        'name', 'description', 'channelQuantity', 'price', 'is_active'
    ];
}
