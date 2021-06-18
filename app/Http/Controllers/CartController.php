<?php

namespace App\Http\Controllers;

Use Alert;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Composer\DependencyResolver\Request;

class CartController extends Controller
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
    
    public function add(Product $product)
    {
        $userId = auth()->user()->id;

        \Cart::session($userId)->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'description'=> $product->description,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));

        // dd($product);
        Alert::success('Added to Cart', 'Product successfully added to your cart!');

        return back();
    }

    public function index()
    {
        $userId = auth()->user()->id;

        $cartItems = \Cart::session($userId)->getContent();

        return view('cart.index', compact('cartItems'));
    }

    public function destroy($itemId)
    {
        $userId = auth()->user()->id;

        \Cart::session($userId)->remove($itemId);

        Alert::success('Removed from Cart', 'Product successfully removed from your cart!');

        return back();
    }

    public function update($rowId)
    {
        $userId = auth()->user()->id;

        \Cart::session($userId)->update($rowId, [
            'quantity' => [
                'relative' => false,
                'value' => request('quantity'),
            ]
        ]);

        return back();
    }

    public function checkout()
    {
        $cartItems = \Cart::session(auth()->user()->id)->getContent();

        if(! \Cart::session(auth()->id())->isEmpty() ) {
            return view('cart.checkout', compact('cartItems'));
        }
        else {
            Alert::warning('Oops!', 'No items in your cart for checkout!');

            return view('cart.index');
        }
    }

    public function applyCoupon()
    {
        $couponCode = request('coupon_code');

        $couponData = Coupon::where('code', $couponCode)->first();

        if(!$couponData) {
            Alert::error('Ooho', 'Invalid coupon code!');
            return back();
        }

        //coupon logic
        $condition = new \Darryldecode\Cart\CartCondition(array(
            'name' => $couponData->name, // summer discount 12.5%
            'type' => $couponData->type, // discount
            'target' => 'total', // subtotal or total
            'value' => $couponData->value, // -12.5%
        ));

        \Cart::session(auth()->id())->condition($condition);

        Alert::success('Coupon applied!', 'Your coupon has successfully applied!');

        return back();
    }
}
