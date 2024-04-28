<x-layout>

    <section class="p-2 text-white md:p-10 lg:15">
        <ul class="flex flex-col items-center justify-center w-full text-black align-middle bg-gray-100 rounded-xl">
            @if (count($posts) === 0)
                <li class="flex justify-between w-full p-5 text-xl text-balck">لم يتم نشر أية مواضيع.</li>
            @endif
            @foreach ($posts as $post)
                @if ($loop->iteration !== 1)
                    <hr class="h-[2px] bg-black w-full">
                @endif
                <x-dashboard-item :post="$post" />
            @endforeach
        </ul>
    </section>

</x-layout>
