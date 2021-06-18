<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubOrderController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\Seller\SellerOrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/home');

Auth::routes();

Auth::routes(['verify' => true]);

if ( file_exists( app_path( 'Http/Controllers/LocalizationController.php') ) ) {
  Route::get('lang/{locale}', [LocalizationController::class, 'lang']);
}

// Home
Route::get('/home', [HomeController::class, 'index'])->name('web.home');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/how-to-list', [HomeController::class, 'how'])->name('web.how');

// Contact
Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contact');
Route::post('/send-message', [HomeController::class, 'sendMail'])->name('contact.send');

// Events
Route::get('events', [EventController::class, 'index'])->name('events.index');
Route::get('events/{id}', [EventController::class, 'getContent'])->name('events.content');

// Product
Route::get('/category', [ProductController::class, 'getCategory'])->name('category.index');
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product-detail/{slug}', [ProductController::class, 'productDetail'])->name('product.detail');
Route::post('/product-filter', [ProductController::class, 'productFilter'])->name('product.filter');
Route::get('/product-category/{slug}', [ProductController::class, 'productCategory'])->name('product.category');

// Auth Section
Route::middleware(['auth'])->group(function () {

    // User Profile
    Route::get('profile', [UserController::class, 'getProfile'])->name('account.profile');
    Route::post('profile-general-update', [UserController::class, 'updateProfileGeneral'])->name('profile.general');
    Route::post('profile-info-update', [UserController::class, 'updateProfileInfo'])->name('profile.info');
    Route::post('profile-social-update', [UserController::class, 'updateProfileSocial'])->name('profile.social');

    // Password Reset
    Route::get('/account/reset', [UserController::class, 'userPassword'])->name('account.reset');
    Route::post('/account-reset-password', [UserController::class, 'resetPassword'])->name('reset.password');

    // User Order list
    Route::get('/user/order', [UserController::class, 'getOrderList'])->name('user.order');
    Route::get('/user/order/{id}', [UserController::class, 'orderDetails'])->name('order.details');

    // User Wishlist
    Route::get('/user/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/store-wishlist', [WishlistController::class, 'storeWishlist'])->name('store.wishlist')->middleware('auth')->middleware('verified');
    Route::post('/remove-from-wishlist', [WishlistController::class, 'removeWishlistItem'])->name('delete.wishlist');

    // Shop
    Route::resource('shops', ShopController::class);
    Route::get('/hawker-shops', [ShopController::class, 'index'])->name('shop');

    // Cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/add-to-cart/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart/destroy/{itemId}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('/cart/update/{itemId}', [CartController::class, 'update'])->name('cart.update');

    // Coupon
    Route::get('/apply-coupon', [CartController::class, 'applyCoupon'])->name('apply.coupon');

    // Orders
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

    // Checkout
    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

    // Comment
    Route::post('save-comment/{id}', [CommentController::class, 'saveComment'])->name('save.comment');
});

// Admin Section
Route::group(['prefix' => 'admin'], function () {

    \Voyager::routes();

    Route::get('/order/pay/{suborder}', [SubOrderController::class, 'pay'])->name('order.pay');

});

// Seller Section
Route::group(['prefix' => 'seller', 'middleware' => 'auth', 'as' => 'seller.'], function () {

    Route::redirect('/','seller/orders');

    Route::resource('/orders',  SellerOrderController::class);

    Route::get('/orders/delivered/{suborder}',  [SellerOrderController::class, 'markDelivered'])->name('order.delivered');

    Route::get('/orders/cancelled/{suborder}',  [SellerOrderController::class, 'markCancelled'])->name('order.cancelled');

});
