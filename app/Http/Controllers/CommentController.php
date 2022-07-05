<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;
use Auth;
class CommentController extends Controller {
    public function __construct() {
        $this->middleware(['auth']);
    }

    public function index() {

    }
    public function storeComment(Request $request) {
        $this->validate($request,[
            'rating' => 'required',
            'message' => 'required'
        ]);
        $comment = new Comment();
        $comment->message = $request->message;
        $comment->rating = $request->rating;
        $comment->user_id = Auth::user()->id;
        $comment->salon_id = $request->salon_id;
        $comment->save();

        return back();
    }
}
