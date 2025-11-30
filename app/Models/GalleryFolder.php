<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryFolder extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
    ];

    public function galleryImage()
    {
        return $this->hasMany(GalleryImage::class);
    }
}
