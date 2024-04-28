<x-layout>
    <section class="flex flex-col-reverse justify-center w-full p-5 my-6 align-middle md:flex-row md:px-12 lg:px-1">
        <div class="flex flex-col items-center justify-center w-full gap-10 p-5 align-middle md:w-2/5 lg:w-1/3 md:p-7 rounded-b-xl md:rounded-r-xl md:rounded-bl-none bg-gradient-to-br from-cyan-400 to-blue-400">
            <p class="w-full text-2xl font-bold text-center">ألديك حساب مسبق؟</p>
            <a href="/register/create" class="block w-2/3 px-4 py-2 text-center text-white rounded-full bg-gradient-to-b from-bgcolor to-gray-800 hover:bg-bgcolor">تسجيل حساب</a>
        </div>
        <form action="/login" method="POST" class="flex flex-col w-full p-5 bg-white md:w-1/2 lg:w-2/5 md:p-7 rounded-t-xl md:rounded-l-xl md:rounded-tr-none">
            @csrf

            <h3 class="w-full my-3 text-xl font-bold text-center">تسجيل الدخول</h3>

            <x-form.login-lbl inputName="username" value="اسم المستخدم:" />
            <x-form.login-inp name="username" required autofocus min-3 max-25 value="{{ old('username') }}"/>

            <x-form.login-lbl inputName="password" value="كلمة المرور:" />
            <x-form.login-inp name="password" type="password"  required min-8/>
            <x-form.error name="password" type="password"/>

            <x-form.error name="username" />


            <button type="submit" name="submit" class="w-32 px-4 py-1 my-5 text-xl text-white duration-200 bg-gray-900 border border-black hover:bg-gray-100 hover:text-bgcolor rounded-xl">تسجيل</button>

        </form>
    </section>
</x-layout>
