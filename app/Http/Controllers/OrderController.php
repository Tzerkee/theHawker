<?php

namespace App\Http\Controllers;

Use Alert;
use App\Models\Order;
use App\Mail\OrderPaid;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Cartalyst\Stripe\Laravel\Facades\Stripe;

class OrderController extends Controller
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
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'shipping_fullname' => 'required',
            'shipping_address1' => 'required',
            'shipping_postcode' => 'required',
            'shipping_city' => 'required',
            'shipping_state' => 'required',
            'shipping_country' => 'required',
            'shipping_phone' => 'required',
            'payment_method' => 'required',
        ]);

        $order = new Order();

        $order->order_number = uniqid('Order #');  // generate unique order id

        $order->shipping_fullname = $request->input('shipping_fullname');
        $order->shipping_address1 = $request->input('shipping_address1');
        $order->shipping_address2 = $request->input('shipping_address2');
        $order->shipping_postcode = $request->input('shipping_postcode');
        $order->shipping_city = $request->input('shipping_city');
        $order->shipping_state = $request->input('shipping_state');
        $order->shipping_country = $request->input('shipping_country');
        $order->shipping_phone = $request->input('shipping_phone');
        $order->remarks = $request->input('remarks');

        // by default, shipping === billing
        if($request->input('billing_fullname') === null) {
            $order->billing_fullname = $request->input('shipping_fullname');
            $order->billing_address1 = $request->input('shipping_address1');
            $order->billing_address2 = $request->input('shipping_address2');
            $order->billing_postcode = $request->input('shipping_postcode');
            $order->billing_city = $request->input('shipping_city');
            $order->billing_state = $request->input('shipping_state');
            $order->billing_country = $request->input('shipping_country');
            $order->billing_phone = $request->input('shipping_phone');
        } else {
            $order->billing_fullname = $request->input('billing_fullname');
            $order->billing_address1 = $request->input('billing_address1');
            $order->billing_address2 = $request->input('billing_address2');
            $order->billing_postcode = $request->input('billing_postcode');
            $order->billing_city = $request->input('billing_city');
            $order->billing_state = $request->input('billing_state');
            $order->billing_country = $request->input('billing_country');
            $order->billing_phone = $request->input('billing_phone');
        }

        $order->total = \Cart::session(auth()->id())->getTotal();
        $order->item_count = \Cart::session(auth()->id())->getContent()->count();

        $order->user_id = auth()->id();

        // Payment section here
        if (request('payment_method') == 'bank_transfer')
        {
            $order->payment_method = 'bank_transfer';
        }

        if (request('payment_method') == 'cod')
        {
            $order->payment_method = 'cod';
        }

        if (request('payment_method') == 'card')
        {
            $request->validate([
                'card_no' => 'required|numeric',
                'exp_month' => 'required|numeric',
                'exp_year' => 'required|numeric',
                'cvc' => 'required|numeric',
            ]);

            $order->payment_method = 'Card';
            $stripe = Stripe::make('sk_test_51IkiBJJSnfKeJ8qDB68ipTbxmOmGAbTuRntB0RP8CffUOTBdhSKE0wCtV4lu4Ry0WevHEzHYGbOWLBoIlPpoGX0y00q1dcPPGl');

            try {
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number'    => $request->get('card_no'),
                        'exp_month' => $request->get('exp_month'),
                        'exp_year'  => $request->get('exp_year'),
                        'cvc'       => $request->get('cvc'),
                    ],
                ]);

                if (!isset($token['id'])) {
                    \Session::put('error','The stripe token was not generated correctly');
                    return redirect()->back();
                }

                $charge = $stripe->charges()->create([
                    'card' => $token['id'],
                    'currency' => 'MYR',
                    'amount' => number_format(\Cart::session(auth()->id())->getTotal(), 2),
                    'description' => 'Payment for order number'. $order->order_number
                ]);

                if ($charge['status'] == 'succeeded')
                {
                    $order->is_paid = 1;

                }
                else {
                    Alert::error('Transaction Error', 'Error Message');
                    return redirect()->back();
                }
            }
            catch (Exception $e) {
                \Session::put('error',$e->getMessage());
                return redirect()->back();
            }
            catch(\Cartalyst\Stripe\Exception\CardErrorException $e) {
                \Session::put('error',$e->getMessage());
                return redirect()->back();
            }
            catch(\Cartalyst\Stripe\Exception\MissingParameterException $e) {
                \Session::put('error',$e->getMessage());
                return redirect()->back();
            }

        }

        // save ordered items
        $order->save();

        // get cart products
        $cartItems = \Cart::session(auth()->id())->getContent();

        foreach ($cartItems as $item) {
            $order->items()->attach($item->id, [
                'price'=> $item->price,
                'quantity'=> $item->quantity
            ]);
        }

        $order->generateSubOrders();

        // Update stock quantity start

        // - M01
        // iterate (loop) over each item in the order items collection
        // $order->items->each(function ($item) {
        //     // deduct the quantity of the item for this order
        //     // from the stock of the product and update the new stock
        //     $item->update(['stock' => ($item->stock - $item->pivot->quantity)]);
            
        // });

        // - M02
        foreach ($order->items as $prod) { 
            
            // dd($order->items);
            $newStock = $prod->stock - $item->quantity;
            $prod->update(['stock' => $newStock]);
        }

        // Update stock quantity end

        \Cart::session(auth()->id())->clear();

        Alert::success('Order Successfully', 'Thank you! You will receive a order confirmation.');

        Mail::to($order->user->email)->send(new OrderPaid($order));

        return redirect()->route('product.index');
    }
}
