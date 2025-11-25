<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'name',
        'position',
        'image',
        'facebook_link',
        'twitter_link',
        'linkedin_link',
        'instagram_link',
    ];
}
