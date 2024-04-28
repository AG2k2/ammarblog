@props(['post'])

<li class="flex justify-between w-full p-5 ">

    <div class="flex items-center gap-7">
        <a href="/?category={{ $post->category->slug }}"
            class="px-3 py-1 rounded-full text-bgcolor h-fit bg-cyan-400">{{ $post->category->name }}</a>
        <div class="text-lg text-black">
            <a href="/posts/{{ $post->slug }}" class="block hover:font-bold">{{ $post->title }}</a>
            <time class="text-sm text-gray-400">{{ $post->created_at }}</time>
        </div>
    </div>

    <div class="flex items-center justify-center gap-5 mx-3 ">
        @if ($post->published_at !== null)
        <p class="px-2 py-1 text-sm text-white rounded-full bg-cyan-400">{{ $post->published_at }}</p>
        @else
        <p class="px-2 py-1 text-sm text-white bg-red-500 rounded-full ">مسودّة</p>
        @endif

        <div class="flex flex-col gap-3 md:flex-row md:gap-5">
            <a href="{{ $post->id }}/edit" class="inline-block text-cyan-600 hover:underline">تعديل</a>
            <form action="/posts/{{ $post->slug }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="inline-block text-red-600 hover:underline">حذف</button>
            </form>
        </div>

    </div>

</li>
