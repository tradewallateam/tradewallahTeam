<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GalleryImage extends Model
{
    protected $fillable = [
        'gallery_folder_id',
        'title',
        'image',
        'status',
    ];


    public function galleryFolder()
    {
        return $this->belongsTo(GalleryFolder::class);
    }
}
