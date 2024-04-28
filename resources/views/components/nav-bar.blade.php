<nav class="relative z-50 flex flex-col items-center justify-between w-full text-white align-middle shadow-sm md:sticky md:flex-row bg-bgcolor shadow-black md:pt-1 md:px-1">
    <div class="fixed bottom-0 right-0 text-xl text-black bg-white btnScrollToTop" data-scroll="up" type="button">
        Top
    </div>
    <div class="justify-between hidden w-full lg:flex">
        <div>
            <a href="/" class="block px-6 py-3 text-4xl text-white font-logo">Ammar<span class="text-cyan-400">Blog</span></a>
        </div>
        <div class="flex flex-col w-full text-lg text-center text-cyan-100 md:w-auto md:flex-row items-middle">

            <div class="flex items-center justify-center text-sm text-center rounded-full text-bgcolor">
                @auth
                    @can ('moderate')
                        <a href="/moderator/posts" class="inline-flex items-center flex-shrink-0 ml-10 text-xl text-cyan-100 hover:text-cyan-300">لوحة التحكم</a>
                    @endcan
                    <a href="/profile/edit" class="flex items-center justify-start w-full h-full gap-4 p-2 text-center text-white hover:text-cyan-400">
                        <img src="{{ asset('/storage/' . auth()->user()->pro_pic) }}" alt="profile pic" class="float-right object-cover w-12 h-12 rounded-full">
                        <span class="inline-block text-lg h-fit">{{ auth()->user()->name }}</span>
                    </a>
                    <form action="/logout" method="POST" class="">
                        @csrf
                        <button class="flex-shrink-0 block w-full h-full px-6 py-2 text-white hover:bg-cyan-500">خروج</button>
                    </form>
                @else
                    <a href="/register/create" class="block w-full px-4 py-2 rounded-r-full bg-cyan-400 hover:bg-cyan-500">انضم إلينا</a>
                    <a href="/login/create" class="block w-full px-4 py-2 border-r rounded-l-full border-bgcolor bg-cyan-400 hover:bg-cyan-500 whitespace-nowrap">سجّل دخولك</a>
                @endauth

            </div>
        </div>
    </div>

    {{--==== NAV FOR MOB ====--}}

    <div class="flex w-full lg:hidden">
        <div class="fixed top-0 right-0">
            <div id="mob-nav" class="fixed top-0 left-0 z-50 w-0 h-full overflow-hidden duration-500 bg-bgcolor/90">

                <a href="javascript:void(0)" class="absolute p-2 text-4xl top-5 right-11" onclick="closeNav()">&times;</a>

                <div class="relative w-full mt-8 text-center overlay-content top-1/4 ">
                    @foreach ($categories as $category)
                        <a href="/?category={{ $category->slug }}" class=" {{ isset($currentCategory) && $category == $currentCategory ? 'bg-cyan-900' : '' }} p-3 text-xl text-cyan-200 block">{{ $category->name }}</a>
                    @endforeach
                    @can('moderate')
                        <a href="/users/posts" class="inline-flex items-center justify-center flex-shrink-0 w-full text-xl text-cyan-100 hover:text-cyan-300">لوحة التحكم</a>
                    @endcan


                    <div class="flex justify-center gap-px py-1 m-2 text-sm text-center rounded-full text-bgcolor">
                        @auth
                            <a href="/profile/edit" class="flex items-center justify-start w-full h-full gap-4 p-2 text-center text-white hover:text-cyan-400">
                                <img src="{{ asset('/storage/' . auth()->user()->pro_pic) }}" alt="profile pic" class="float-right object-cover w-12 h-12 rounded-full">
                                <span class="inline-block text-lg h-fit">{{ auth()->user()->name }}</span>
                            </a>
                            <form action="/logout" method="POST" class="">
                                @csrf
                                <button class="flex-shrink-0 block w-full h-full px-6 py-2 text-white hover:bg-cyan-500">خروج</button>
                            </form>
                        @else
                            <a href="/register/create" class="block w-full px-4 py-2 rounded-r-full bg-cyan-400 hover:bg-cyan-500">انضم إلينا</a>
                            <a href="/login/create" class="block w-full px-4 py-2 rounded-l-full border-r-bgcolor bg-cyan-400 hover:bg-cyan-500">سجّل دخولك</a>
                        @endauth
                    </div>
                </div>

            </div>

            <span onclick="openNav()" class="block px-4 py-3 text-2xl text-bgcolor bg-cyan-400">&#9776;</span>

        </div>
        <div class="w-full text-center">
            <a href="/" class="block px-4 py-2 text-4xl text-white font-logo">Ammar<span class="text-cyan-400">Blog</span></a>
        </div>
    </div>
</nav>
