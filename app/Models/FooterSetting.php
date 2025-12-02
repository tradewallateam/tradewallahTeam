<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterSetting extends Model
{
    protected $fillable = [
        'description',
        'privacy_policy',
        'terms_conditions'
    ];
}
