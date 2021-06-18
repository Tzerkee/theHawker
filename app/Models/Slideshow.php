<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slideshow extends Model
{
    use HasFactory;

    protected $table = 'slideshows';

    protected $fillable = ['title', 'slug', 'image', 'description', 'publish'];

    protected $casts = [
        'id' => 'integer',
        'image' => 'string',
        'title' => 'string',
        'slug' => 'string',
        'description' => 'string',
        'publish' => 'integer',
    ];

    /*=============================
    =            scope            =
    =============================*/
    public function scopePublish($q)
    {
        $q->where($this->table.'.publish', true);
    }
}
