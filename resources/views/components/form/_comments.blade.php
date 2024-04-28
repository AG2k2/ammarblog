<div class="w-full p-5 flex flex-col gap-4 border border-white bg-cyan-950/10 rounded-xl mt-3">
    @if ($post->comments->count() == 0)
        <p class="text-base p-2">
            لا يوجد تعليقات حتى الآن.
        </p>
    @endif
    @foreach ($post->comments->sortByDesc('published_at') as $comment)
        @if ($loop->iteration > 1)
            <hr class="my-2 opacity-50">
        @endif
        <div class="w-full flex items-center justify-between">
            <header class=" flex gap-5">
                <img src="{{ asset('storage/' . $comment->author->pro_pic) }}" alt="user profile pic" class="w-10 h-10 flex-shrink-0 rounded-full object-cover">
                <div>
                    <h3 class="text-lg">{{ $comment->author->name }}</h3>
                    <time class="text-sm">{{ Carbon::parse($comment->published_at)->diffForHumans() }}</time>
                </div>
            </header>
            @auth
                @if (auth()->user() == $comment->author)
                    <form action="/comments/{{ $comment->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 text-sm hover:underline">حذف التعليق</button>
                    </form>
                @endif
            @endauth
        </div>
        <article class="w-full">
            <p class="text-base p-2">
                {{ $comment->body }}
            </p>
        </article>
    @endforeach
</div>
