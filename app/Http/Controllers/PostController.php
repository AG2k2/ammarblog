<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index() {
        App::setLocale("ar");
        return view("home.index", [
            'posts' => Post::latest()-> where('published_at', '<>', null)->filter(request(['category', 'search']))-> paginate(8)-> withQueryString(),
            'categories' => Category::latest()->get(),
        ]);
    }

    public function create(Category $category) {
        switch ($category->slug) {
            case 'novels': return view('posts.createNovel'); break;
            case 'drawings': return view('posts.createDrawing'); break;
            case 'stories': return view('posts.createStory'); break;
            case 'thoughts': return view('posts.createThought'); break;
        }
    }

    public function store(Request $request, Category $category) {
        switch ($category->slug) {
            case 'novels': $attributes = $request->validate([
                'title'=> ['required', Rule::unique('posts', 'title')],
                'excerpt' => ['required'],
                'thumbnail' => ['required', 'image'],
            ]); break;
            case 'drawings': $attributes = $request->validate([
                'title'=> ['required', Rule::unique('posts', 'title')],
                'thumbnail' => ['required', 'image'],
            ]); break;
            case 'stories' || 'thoughts' : $attributes = $request->validate([
                'title'=> ['required', Rule::unique('posts', 'title')],
                'excerpt'=> ['required',],
                'thumbnail' => ['image'],
                'body' => ['required',],
            ]); break;
        }

        if ($request->excerpt ?? false) {$attributes['excerpt'] = $this->nl2p($request->excerpt);};
        if ($request->body ?? false) {$attributes['body'] = $this->nl2p($request->body);};
        $attributes['slug'] = Str::slug($category->slug . $attributes['title']);
        $attributes['category_id'] = $category->id;
        $attributes['user_id'] = auth()->user()->id;
        if ($request->thumbnail ?? false){
            $attributes['thumbnail'] = Storage::disk('public')->put( 'thumbnails' ,$request->thumbnail);
        }
        if($request->publish === 'publish') {
            $attributes['published_at'] = Carbon::now();
        }

        $post = Post::create( $attributes );
        return redirect('/posts/' . $post->slug);
    }

    public function show(Post $post) {
        return view('home.show', ['post' => $post]);
    }

    protected function nl2p(String $content) {
        $content2 = nl2br($content);
        $content2 = '<p class="indent-8 my-6">'
                    . str_replace('<br />','</p><p class="indent-8 my-6">', $content2)
                    . '</p>' ;
        return $content2;
    }

}
