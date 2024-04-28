<x-layout>

    <section class="flex flex-col items-center justify-center w-full p-5 align-middle">
        <div class="z-20 flex items-center justify-center w-full h-32 shadow-md bg-cyan-400 md:w-2/3 rounded-t-2xl shadow-gray-700">
            <h3 class="text-2xl md:text-3xl">تعديل البيانات الشخصية</h3>
        </div>
        <main class="z-10 w-full bg-gray-100 shadow-sm md:w-2/3 shadow-cyan-300 rounded-b-2xl p-7">
            <form action="{{ auth()->user()->id }} " method="POST" class="" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <x-form.lbl name="name" lbl="الاسم:" />
                <x-form.input name="name" value="{{auth()->user()->name}}" type="text"  />
                <x-form.error name="name" />

                <x-form.lbl name="username" lbl="اسم المستخدم:" />
                <x-form.input name="username" value="{{auth()->user()->username}}" type="text"  />
                <x-form.error name="useraname" />

                <x-form.lbl name="email" lbl="البريد الالكتروني:" />
                <x-form.input name="email" value="{{auth()->user()->email}}" type="email"  />
                <x-form.error name="email" />

                <x-form.lbl name="pro_pic" lbl="الصورة الشخصية:" />
                <x-form.input name="pro_pic" type="file" />
                <x-form.error name="pro_pic" />
                <img src="{{ asset('/storage/' . auth()->user()->pro_pic) }}" alt="profile pics" class="h-auto m-auto my-5 w-96">

                <div class="w-full text-center">
                    <button type="submit" class="px-10 py-2 text-xl text-black hover:bg-cyan-500 bg-cyan-400 rounded-xl">حفظ</button>
                </div>

            </form>

            <hr class="bg-gray-400 w-full my-4 h-[2px]">

            <form action="{{ auth()->user()->id }}" method="post">
                @csrf
                @method('PATCH')

                <x-form.lbl name="oldpassword" lbl="كلمة المرور القديمة:" />
                <x-form.input name="oldpassword" type="password"  />
                <x-form.error name="oldpassword" />

                <x-form.lbl name="password" lbl="كلمة المرور الجديدة:" />
                <x-form.input name="password" type="password"  />
                <x-form.error name="password" />

                <x-form.lbl name="password_confirmation" lbl="أعد إدخال كلمة المرور الجديدة:" />
                <x-form.input name="password_confirmation" type="password"  />
                <x-form.error name="password_confirmation" />

                <div class="w-full text-center">
                    <button type="submit" class="px-10 py-2 text-xl text-black hover:bg-cyan-500 bg-cyan-400 rounded-xl">تغيير كلمة المرور</button>
                </div>

            </form>

            <form action="/profile/{{ auth()->user()->id }}" method="POST" class="my-4">
                @csrf
                @method('DELETE')

                <div class="w-full">
                    <button type="submit" class="px-5 py-1 text-base text-black hover:bg-red-500 bg-400 hover:text-white rounded-xl">حذف الحساب</button>
                </div>

            </form>
        </main>
    </section>

</x-layout>
