<x-layout>

    <x-slot name="header">
        @include('home._header')
    </x-slot>

    <section>


        <form action="/?" method="GET" class="flex justify-center w-full gap-0 px-5 py-16 align-middle border-t border-b border-cyan-400">

            <input type="text" name="search" placeholder="بحث عن عنوان موضوع..." class="w-full px-5 py-2 text-base duration-200 border border-l-0 rounded-r-full md:w-3/4 md:text-xl placeholder:text-gray-500 border-cyan-400 focus:outline-none">

            <button type="submit" id="search" name="search" class="w-24 text-xl border border-r-0 rounded-l-full bg-cyan-400 border-cyan-400 hover:text-gray-700"><i class="fa fa-search"></i></button>

        </form>

        @can('moderate')
            <div class="flex flex-col items-center justify-center w-full gap-2 p-5 align-middle ">
                <div x-data="{show:false}"
                class="flex flex-col items-center justify-center w-full md:flex-row md:align-middle md:justify-start"
                @click.away="show=false">
                    <div @click="show = !show"
                    class="w-auto p-3 text-base text-center text-white border border-white rounded-md cursor-pointer hover:bg-white hover:text-black">
                        انشئ
                    </div>
                    <div x-show="show"
                    style="display: none"
                    class="w-full py-2 mt-4 bg-gray-200 rounded-md md:bg-transparent md:m-0 md:p-0 md:flex md:justify-evenly md:gap-5">
                        @foreach ($categories as $category)
                            <a href="/posts/{{$category->slug}}/create" class="block w-full text-base text-center text-black hover:bg-cyan-400 md:hover:text-black md:rounded-md md:text-white md:p-3 md:w-auto">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endcan

        <main class="block w-full m-auto lg:flex lg:flex-row lg:">

            @if (count($posts) === 0)
                <p class="w-full mx-10 my-auto text-xl text-white">لا توجد مواضيع.</p>
            @endif

            <div class="flex flex-col justify-start w-full p-3">

                @foreach ($posts as $post)
                        <x-post-card :post="$post" class="h-full"/>
                @endforeach

            </div>

            @include('home._side-nav')

        </main>

        {{ $posts->links() }}

    </section>

</x-layout>
