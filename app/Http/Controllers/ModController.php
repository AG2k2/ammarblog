<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ModController extends Controller
{
    public function index()
    {
        return view("users.posts.dashboard", [
            'posts' =>  Post::latest()->where('user_id', request()->user()->id)->paginate(20),
        ]);
    }

    public function edit(Post $post)
    {
        if ($post->author != auth()->id()) {
            return abort(403);
        }
        return view('users.posts.edit', [
            'post' => $post,
        ]);
    }

    public function update(Request $request, Post $post)
    {
        if ($post->author != auth()->id()) { return abort(403); }


    }

    public function destroy(Post $post)
    {
        if ($post->author->id != auth()->id()) { return abort(403); }
        $post->delete();
        return back()->with('success','تم حذف الموضوع.');
    }
}
