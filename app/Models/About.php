<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image_1',
        'image_2',
    ];

    public function aboutCarts()
    {
        return $this->hasMany(AboutCart::class);
    }
}
