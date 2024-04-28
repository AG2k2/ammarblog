<x-layout>

    <section class="w-full flex flex-col justify-center items-center align-middle h-[90vh] p-5">
        <div class="z-20 flex items-center justify-center w-full h-32 shadow-md bg-cyan-400 md:w-2/3 rounded-t-2xl shadow-gray-700">
        </div>
        <main class="z-10 w-full bg-gray-100 shadow-sm md:w-2/3 shadow-cyan-300 rounded-b-2xl p-7">
            <form action="/posts/drawings" method="POST" class="" enctype="multipart/form-data" enctype="multipart/form-data">
                @csrf

                <x-form.lbl name="title" lbl="العنوان:" />
                <x-form.input name="title" inputValue="{{ old('title') }}" type="text"  />
                <x-form.error name="title" />

                <x-form.lbl name="thumbnail" lbl="الصورة:" />
                <x-form.input name="thumbnail" type="file"  />
                <x-form.error name="thumbnail" />

                <select name="publish" id="published" class="relative w-full py-2 my-4 border-2 border-black lg:w-1/4 px-7 rounded-xl">
                    <option value="publish">نشر</option>
                    <option value="">مسودّة</option>
                </select>

                <div class="w-full text-center">
                    <button type="submit" class="px-10 py-2 text-xl text-black hover:bg-cyan-500 bg-cyan-400 rounded-xl">حفظ</button>
                </div>


            </form>
        </main>
    </section>

</x-layout>
