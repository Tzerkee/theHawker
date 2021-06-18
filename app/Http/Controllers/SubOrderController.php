<?php

namespace App\Http\Controllers;

use App\Models\SubOrder;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SubOrderController extends Controller
{
    public function pay(SubOrder $suborder)
    {
        $suborder->transactions()->create([
            'transaction_id'=> uniqid('T#'.$suborder->id),
            'amount_paid'=> $suborder->total,
        ]);

        Alert::toast('Transaction Created', 'success');

        return redirect()->to('/admin/transactions')->withMessage('Transaction Created');
    }
}
