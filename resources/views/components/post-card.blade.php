
@props(['post'])

<div {{ $attributes->merge(['class' => "p-3 lg:p-2 hover:w-full"]) }}>
    <div class="relative flex flex-col justify-center w-full h-full align-middle duration-300 lg:flex-row rounded-xl hover:bg-cyan-400/5 shadow-around shadow-cyan-400/50">

        @if ($post->thumbnail ?? false)
            <div class=" lg:w-80">
                <a href="/posts/{{ $post->slug }}" class="my-2"><img src="{{ asset('/storage/' . $post->thumbnail) }}" alt="post thumbnail" class="w-full h-auto rounded-r-lg"></a>
            </div>
        @endif

        <main class="relative flex flex-col justify-center m-5 lg:my-0 lg:w-full">
            <div class="flex items-center justify-between my-2">

                <a href="/?category={{ $post->category->slug }}" class="block px-5 py-1 text-base duration-100 border rounded-full hover:bg-bgcolor hover:text-cyan-400 border-cyan-400 text-bgcolor bg-cyan-400 ">{{ $post->category->name }}</a>
                <time class="text-sm text-gray-300">{{ Carbon::parse($post->published_at)->diffForHumans() }}</time>

            </div>



            <header class="w-full mt-3 text-3xl text-white ">
                <a href="/posts/{{ $post->slug }}" class="block w-full ">{{ $post->title }}</a>
            </header>


            @if ($post->category->slug !== 'drawings')
                <div class="w-full my-2 text-justify text-white">
                    {!! $post->excerpt !!}
                </div>
                <footer class="flex justify-end w-full my-4">
                    <a href="/posts/{{ $post->slug }}" class="block w-32 px-3 py-1 text-center duration-200 bg-gray-200 rounded-full hover:bg-gray-400">تابع القراءة</a>
                </footer>
            @endif
        </main>
    </div>
</div>
