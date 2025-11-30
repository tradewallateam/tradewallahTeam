<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientTestimonial extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'image',
        'rating',
        'message',
        'is_active',
    ];
}
