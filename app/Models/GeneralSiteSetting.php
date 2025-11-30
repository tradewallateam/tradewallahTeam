<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralSiteSetting extends Model
{
    protected $fillable = [
        'about_title',
        'about_description',
        'service_title',
        'service_description',
        'team_title',
        'team_description',
        'pricing_title',
        'pricing_description',
        'rist_disclaimer_title',
        'rist_disclaimer_description',
        'contact_title',
        'contact_description',
        'testimonial_title',
        'testimonial_description',
        'happy_traders',
        'client_rating',
        'total_client_volume',
    ];
}
