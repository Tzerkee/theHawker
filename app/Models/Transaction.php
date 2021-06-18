<?php

namespace App\Models;

use App\Models\SubOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'transactions';

    /*====================================
    =            relationship            =
    ====================================*/

    public function subOrder()
    {
        return $this->belongsTo(SubOrder::class);
    }
}
