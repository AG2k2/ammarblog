<section class="flex flex-col gap-5 p-2 mt-8 text-white md:flex-row md:p-10 md:mt-5">

    @if ($post->thumbnail ?? false)
        <div class="flex-shrink-0 w-full md:w-1/4">
            <img src="{{ asset('/storage/' . $post->thumbnail) }}" alt="post thumbnail" class="m-auto rounded-full">
        </div>
    @endif

    <div class="w-full p-2 border-white md:w-10/12 md:p-5 boder-r">

        <a href="/" class="block text-lg hover:text-cyan-400"><  الصفحة الرئيسة</a>

        <div class="flex justify-between my-5">
            <a href="/?category={{ $post->category->slug }}" class="block px-5 py-1 text-base duration-100 border rounded-md hover:bg-bgcolor hover:text-cyan-400 border-cyan-400 text-bgcolor bg-cyan-400 ">{{ $post->category->name }}</a>
            <time>{{ Carbon::parse($post->published_at)->diffForHumans() }}</time>
        </div>

        <h3 class="text-3xl font-bold ">{{ $post->title }}</h3>
        <article class="my-5 text-xl text-justify ">{!! $post->body !!}</article>

    </div>

</section>
