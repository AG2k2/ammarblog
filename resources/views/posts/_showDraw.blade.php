<section class="flex flex-col gap-5 p-2 m-auto mt-8 text-white md:p-10 md:mt-5 md:w-3/4">

    <a href="/" class="block text-lg hover:text-cyan-400"><  الصفحة الرئيسة</a>

    <div class="flex justify-between my-5">
        <a href="/?category={{ $post->category->slug }}" class="block px-5 py-1 text-base duration-100 border rounded-md hover:bg-bgcolor hover:text-cyan-400 border-cyan-400 text-bgcolor bg-cyan-400 ">{{ $post->category->name }}</a>
        <time>{{ Carbon::parse($post->published_at)->diffForHumans() }}</time>
    </div>

    <h3 class="text-3xl font-bold ">{{ $post->title }}</h3>

    <div class="flex-shrink-0 w-full m-auto md:w-11/12">
        <a href="{{ asset('/storage/' . $post->thumbnail) }}"><img src="{{ asset('/storage/' . $post->thumbnail) }}" alt="post thumbnail" class="w-auto h-auto m-auto"></a>
    </div>

</section>
