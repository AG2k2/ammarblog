<x-layout>

    @switch($post->category->slug)
        @case('drawings')
            @include('posts._showDraw')
            @break
        @case('novels')
            @include('posts._showNovel')
            @break
        @default
            @include('posts._show')
    @endswitch

    <x-comment-section :post="$post" class="m-auto md:w-10/12"/>


</x-layout>
