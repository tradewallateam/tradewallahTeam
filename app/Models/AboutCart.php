<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutCart extends Model
{
    protected $fillable = [
        'about_id',
        'icon',
        'title',
        'description',
    ];

    public function about()
    {
        return $this->belongsTo(About::class);
    }
}
