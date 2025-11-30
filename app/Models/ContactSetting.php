<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactSetting extends Model
{
    protected $fillable = [
        'contact_title',
        'contact_description',
        'address',
        'email',
        'phone_number',
        'map_link',
        'site_link',
    ];
}
