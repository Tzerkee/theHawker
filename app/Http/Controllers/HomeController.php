<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Product;
use App\Models\Category;
use App\Models\Slideshow;
use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $slideshows = Slideshow::where('publish', 1)->orderBy('id', 'DESC')->limit('5')->get();
        $all = Product::publish()->where('publish', 1)->inRandomOrder()->limit('10')->get();
        $newest = Product::where(['publish' => 1])->orderBy('created_at', 'DESC')->limit('10')->get();
        $categories = Category::where(['publish'=> 1, 'is_parent'=> 1])->orderBy('name', 'ASC')->get();
        $events = Event::publish()->orderBy('event_date', 'DESC')->limit('3')->get();

        return view('home', compact('slideshows', 'all', 'newest', 'categories', 'events'));
    }

    public function search(Request $request)
    {
        $pagination = 12;
        $query = $request->input('query');
        $products = Product::where('name','LIKE',"%$query%")->paginate($pagination);

        $cats = Category::where(['publish' => 1, 'is_parent' => 1])->with('products')->orderBy('name', 'ASC')->get();

        return view('product.search-result', compact('products', 'cats'));
    }


    public function how()
    {
        return view('home.how');
    }

    public function contactUs()
    {
        return view('home.contact');
    }

    public function sendMail(Request $request)
    {
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message
        ];

        //send mail to admin
        $admins = User::whereHas('role', function ($q) {
            $q->where('name', 'admin');
        })->get();

        Mail::to($admins)->send(new ContactUsMail($details));

        return back()->with('message_sent', 'Your message was sent successfully');
    }

}
