<?php

namespace App\Models;

use App\Models\Shop;
use App\Models\User;
use App\Models\Product;
use App\Models\Transaction;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'orders';

    /*=============================
    =            scope            =
    =============================*/
    public function scopePublish($q)
    {
        $q->where($this->table.'.publish', true);
    }

    public function generateSubOrders()
    {
        $orderItems = $this->items;

        // group ordered items based on shop
        foreach($orderItems->groupBy('shop_id') as $shopId => $products) {

            $shop = Shop::find($shopId);

            $suborder = $this->subOrders()->create([
                'order_id'=> $this->id,
                'seller_id'=> $shop->user_id ?? 1,
                'total'=> $products->sum('pivot.price'),
                'item_count'=> $products->count()
            ]);

            foreach($products as $product)
            {
                $suborder->items()->attach($product->id, [
                    'price' => $product->pivot->price,
                    'quantity' => $product->pivot->quantity
                ]);
            }

        }
    }

    /*====================================
    =            relationship            =
    ====================================*/

    public function items()
    {
        return $this->belongsToMany(Product::class,'order_items', 'order_id', 'product_id')->withPivot('quantity', 'price')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subOrders()
    {
        return $this->hasMany(SubOrder::class);
    }
}
