<?php

namespace App\Http\Controllers\Seller;
use App\Models\SubOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class SellerOrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('verified');
    }
    
    public function index()
    {
        $orders = SubOrder::where('seller_id', auth()->id())->get();

        return view('sellers.orders.index', compact('orders'));

    }

    public function show(SubOrder $order)
    {
        $items = $order->items;

        return view('sellers.orders.show', compact('items'));
    }

    public function markDelivered(SubOrder $suborder)
    {
        $suborder->status = 'completed';
        $suborder->save();

        //check if all suborders complete
        $pendingSubOrders = $suborder->order->subOrders()
                                ->where('status','!=', 'completed')
                                ->count();

        if($pendingSubOrders == 0)
        {
            $suborder->order()->update(['status'=>'completed']);
        }

        Alert::toast('Order being marked as Completed!', 'success');

        return redirect('/seller/orders');
    }

    public function markCancelled(SubOrder $suborder)
    {
        $suborder->status = 'cancelled';
        $suborder->save();
        $suborder->order()->update(['status'=>'cancelled']);

        Alert::toast('Order being marked as Cancelled!', 'success');

        return redirect('/seller/orders');
    }
}
