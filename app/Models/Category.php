<?php

namespace App\Models;

use App\Models\Product;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Models\Category as ModelsCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends ModelsCategory
{
    use HasFactory, Translatable;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'image',
        'is_parent',
        'description',
        'publish',
        'parent_id'
    ];

    /*=============================
    =            scope            =
    =============================*/
    public function scopePublish($q)
    {
        $q->where($this->table.'.publish', true);
    }

    public static function shiftChild($cat_id)
    {
        return Category::whereIn('id', '$cat_id')->update(['is_parent' => 1]);
    }

    public static function getChildByParentID($id)
    {
        return Category::where('parent_id', '$id')->pluck('name', 'id');
    }

    /*====================================
    =            relationship            =
    ====================================*/

    public function products()
    {
        // foreign key, local key
        return $this->hasMany(Product::class,'cat_id', 'id')->where('publish', 1);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
