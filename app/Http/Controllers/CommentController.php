<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CommentController extends Controller
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
    
    public function saveComment(Request $request, $id)
    {
        $request->validate([
            'comment'=>'required'
        ]);

       $data = new Comment();
       $data->user_id = auth()->user()->id;
       $data->product_id = $id;
       $data->comment = $request->comment;
       $data->save();

       Alert::toast('Comment saved!', 'success');

        return redirect()->back();
    }
}
