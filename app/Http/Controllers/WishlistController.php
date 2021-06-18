<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
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
        $wishlists = Wishlist::where('user_id', Auth::id())->get();
        return view('account.profile', compact('wishlists') );
    }

    public function storeWishlist(Request $request)
    {
        $product_id = $request->product_id;

        if( Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->exists() ) {
            return response()->json(['status' => 'Product already in wishlist', 'icon'=>'info']);
        }
        else {
            $wishlist = new Wishlist();
            $wishlist->user_id = Auth::id();
            $wishlist->product_id = $product_id;
            $wishlist->save();

            return response()->json(['status' => 'Product was added to your wishlist', 'icon'=>'success']);
        }
    }

    public function removeWishlistItem(Request $request)
    {
        $wishlist_id = $request->wishlist_id;

        if( Wishlist::where('user_id', Auth::id())->where('id', $wishlist_id)->exists() )
        {
            $wishlist = Wishlist::where('user_id', Auth::id())->where('id', $wishlist_id)->first();
            $wishlist->delete();
            return response()->json(['status' => 'Product was removed from your wishlist', 'icon'=>'success']);
        }
        else {
            $wishlist = new Wishlist();
            $wishlist->user_id = Auth::id();
            $wishlist->wishlist_id = $wishlist_id;
            $wishlist->save();

            return response()->json(['status' => 'No item found in wishlist', 'icon'=>'warning']);
        }
    }


}
