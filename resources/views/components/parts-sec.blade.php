@props(['post'])

<section class="flex flex-col w-full px-6 py-4 my-5 text-xl text-gray-100 rounded-3xl">
    @if ($post->parts->count() === 0)
        <p class="text-lg">لا فصول بعد</p>
    @else
        @foreach ($post->parts->sortBy('created_at') as $part)
            @if ($part->published_at !== null)
                @if ($loop->iteration !== 1)
                    <hr class="bg-gray-300 h-[1px] my-4">
                @endif
                <div x-data="{show:false}" class="">
                    <button @click="show = !show " class="w-full font-bold text-right ">
                        فصل: {{ $part->title }}
                        <span class="inline-flex items-center float-left mx-2"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                        <span class="float-left text-sm text-gray-400">تم النشر {{ Carbon::parse($part->published_at)->diffForHumans() }}</span>
                    </button>
                    <article x-show="show" style="display: none;" class="my-4 text-justify border-gray-600 border-y">
                        {!! $part->body !!}
                    </article>
                </div>
            @else
                @if (auth()->user() == $post->author)
                    @if ($loop->iteration !== 1)
                        <hr class="bg-gray-300 h-[1px] my-4">
                    @endif
                    <div x-data="{show:false}" class="">
                        <button @click="show = !show " class="w-full font-bold text-right text-red-300">
                        {{ $part->title }}
                            <span class="float-left"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                        </button>
                        <article x-show="show" style="display: none;" class="my-4 border-t border-b border-gray-600">
                            <p class="">{!! $part->body !!}</p>
                        </article>
                    </div>
                @endif
            @endif
        @endforeach
    @endif


    @auth
        @if (auth()->user() == $post->author)
            <div x-data="{show:false}" class="my-5">
                <div @click="show = !show">
                    <button class="float-left p-3 text-base bg-gray-100 rounded-full text-bgcolor hover:bg-gray-200">إضافة فصل</button>
                </div>

                <form action="/posts/{{ $post->slug }}/parts" method="POST" enctype="multipart/form-data" x-show="show" style="display: none;" class="p-5 text-black bg-gray-200 rounded-xl">
                    @csrf

                    <x-form.lbl name="title" lbl="العنوان:" />
                    <x-form.input name="title" type="text"  />
                    <x-form.error name="title" />

                    <x-form.lbl name="body" lbl="النص:" />
                    <x-form.txtarea name="body" row="20" />
                    <x-form.error name="body" />

                    <select name="publish" id="published" class="relative w-full py-2 my-4 border-2 border-black lg:w-1/4 px-7 rounded-xl">
                        <option value="publish">نشر</option>
                        <option value="" selected>مسودّة</option>
                    </select>

                    <div class="w-full text-center">
                        <button type="submit" class="px-10 py-2 text-xl text-black hover:bg-cyan-500 bg-cyan-400 rounded-xl">حفظ</button>
                    </div>

                </form>
            </div>
        @endif
    @endauth

</section>
