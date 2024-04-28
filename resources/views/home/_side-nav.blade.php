<nav class="flex-col flex-shrink-0 hidden w-1/4 px-5 py-3 my-3 text-white border-r border-white lg:flex">
    <div class="sticky top-0">
        <a href="/" class="block px-5 py-4 hover:bg-cyan-950">الرئيسية</a>
        @foreach ($categories as $category)
            <a href="/?category={{ $category->slug }}" class=" {{request('category') && $category->slug == request('category') ? 'bg-cyan-900' : '' }} block py-4 px-5 hover:bg-cyan-950">{{ $category->name }}</a>
        @endforeach
    </div>

</nav>
