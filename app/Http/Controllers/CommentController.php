<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post )
    {

        $attributes = $request->validate([
            "body" => ["required","string"],
        ]);

        $attributes['user_id'] = $request->user()->id;
        $attributes['published_at'] = Carbon::now();
        $post->comments()->create( $attributes);
        return back();
    }

    public function destroy(Comment $comment)
    {
        if ( auth()->user() != $comment->author ) {
            return back();
        }
        $comment->delete();
        return back()->with('success','تم حذف التعليق');
    }
}
