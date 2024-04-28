<?php

namespace App\Http\Controllers;

use App\Models\Part;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PartController extends Controller
{
    public function create()
    {
        return view("parts.create");
    }

    public function store(Request $request, Post $post)
    {
        $attributes = $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        if($request->publish === 'publish') {
            $attributes['published_at'] = Carbon::now();
        }
        $attributes['body'] = $this->nl2p($request->body);
        $attributes['post_id'] = $post->id;

        Part::create($attributes);
        return back();
    }

    protected function nl2p(String $content) {
        $content2 = nl2br($content);
        $content2 = '<p class="my-6 indent-8">'
                    . str_replace('<br />','</p><p class="my-6 indent-8">', $content2)
                    . '</p>' ;
        return $content2;
    }
}
