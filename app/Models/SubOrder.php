<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;

class SubOrder extends Model
{
    protected $guarded = [];

    public function items()
    {
        return $this->belongsToMany(Product::class, 'sub_order_items', 'sub_order_id', 'product_id')->withPivot('quantity', 'price');
    }

    public function order()
    {
        return $this->belongsTo(Order::class)->orderBy('created_at', 'desc');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
