<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactHeader extends Model
{
    protected $fillable = [
        'address',
        'phone',
        'email',
        'website',
        'map_embed_code',
        'contact_title',
        'contact_description',
    ];
}
