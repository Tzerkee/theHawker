<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
        'is_active',
        'user_id',
    ];

    /*=============================
    =            scope            =
    =============================*/
    public function scopePublish($q)
    {
        $q->where($this->table.'.publish', true);
    }

    /*====================================
    =            relationship            =
    ====================================*/

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'shop_id');
    }
}
