<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    protected $fillable = [
        'location',
        'phone_number',
        'email',
        'square_logo',
        'horizontal_logo',
        'png_horizontal_logo',
        'png_square_logo',
        'favicon',
        'title',
        'subtitle',
        'subtitle_description',
        'video_link',
        'background_image_1',
        'background_image_2',
        
    ];
}
