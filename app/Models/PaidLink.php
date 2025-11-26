<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaidLink extends Model
{
    protected $fillable = [
        'link_name',
        'type',
        'link_url',
        'status',
    ];

    public function userLinks()
    {
        return $this->hasMany(UserLink::class);
    }
}   
