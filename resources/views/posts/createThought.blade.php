<x-layout>

    <section class="flex flex-col items-center justify-center w-full p-5 align-middle">
        <div class="z-20 flex items-center justify-center w-full h-32 shadow-md bg-cyan-400 md:w-2/3 rounded-t-2xl shadow-gray-700">
        </div>
        <main class="z-10 w-full bg-gray-100 shadow-sm md:w-2/3 shadow-cyan-300 rounded-b-2xl p-7">
            <form action="/posts/thoughts" method="POST" enctype="multipart/form-data" >
                @csrf

                <x-form.lbl name="title" lbl="العنوان:" />
                <x-form.input name="title" type="text"  />
                <x-form.error name="title" />

                <x-form.lbl name="thumbnail" lbl="الصورة:" />
                <x-form.input name="thumbnail" type="file"  />
                <x-form.error name="thumbnail" />

                <x-form.lbl name="excerpt" lbl="الوصف:" />
                <x-form.txtarea name="excerpt" row="5" />
                <x-form.error name="excerpt" />

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
        </main>
    </section>

</x-layout>
