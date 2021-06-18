<?php

namespace App\Models;

use App\Models\Shop;
use App\Models\Order;
use App\Models\Review;
use App\Models\Category;
use TCG\Voyager\Traits\Resizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, Resizable;

    protected $table = 'products';

    protected $translatable = [
        'id',
        'shop_id',
        'cat_id',
        'child_cat_id',
        'name',
        'slug',
        'image',
        'images',
        'description',
        'price',
        'stock',
        'condition',
        'publish',
        'created_at',
        'updated_at',
        'title',
        'body'
    ];

    protected $fillable = [
        'name',
        'image',
        'images',
        'description',
        'price',
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

    // Shop
    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id');
    }

    // related products
    public function products()
    {
        return $this->hasMany(Product::class, 'cat_id', 'cat_id')->where('publish', true)->limit(10);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    public function child_category()
    {
        return $this->belongsTo(Category::class, 'child_cat_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class,'order_items', 'order_id', 'product_id')->withPivot('quantity', 'price')->withTimestamps();
    }

    function comments(){
    	return $this->hasMany(Comment::class)->orderBy('id','desc');
    }
}
