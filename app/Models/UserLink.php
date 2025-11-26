<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLink extends Model
{
    protected $fillable = [
        'user_id',
        'paid_link_id',
        'is_active',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paidLink()
    {
        return $this->belongsTo(PaidLink::class);
    }
}
