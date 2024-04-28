<x-layout>
    <section class="flex flex-col justify-center w-full h-full p-5 my-6 align-middle md:flex-row md:px-12 lg:px-1">

        <form action="/register" method="POST" class="flex flex-col w-full p-5 bg-white md:w-1/2 lg:w-2/5 md:p-7 rounded-t-xl md:rounded-r-xl md:rounded-tl-none">
            @csrf

            <h3 class="w-full my-3 text-xl font-bold text-center">تسجيل حساب جديد</h3>

            <x-form.login-lbl inputName="name" value="الاسم:" />
            <x-form.login-inp name="name" required min-5 max-20 value="{{ old('name') }}" autofocus/>
            <x-form.error name="name" />

            <x-form.login-lbl inputName="username" value="اسم المستخدم (بالإنجليزية):" />
            <x-form.login-inp name="username" required min-3 max-25 value="{{ old('username') }}"/>
            <x-form.error name="username" />

            <x-form.login-lbl inputName="email" value="البريد الالكتروني:" />
            <x-form.login-inp name="email" type="email"  required value="{{ old('email') }}"/>
            <x-form.error name="email" type="email"/>

            <x-form.login-lbl inputName="gender" value="النوع:" />
            <select name="gender" class="h-10 px-4 border border-black rounded-xl">
                <option disabled selected></option>
                <option value="male">ذكر</option>
                <option value="female">أنثى</option>
            </select>
            <x-form.error name="gender" type="email"/>

            <x-form.login-lbl inputName="password" value="كلمة المرور:" />
            <x-form.login-inp name="password" type="password"  required min-8/>
            <x-form.error name="password" type="password"/>

            <x-form.login-lbl inputName="password_confirmation" value="إعادة كلمة المرور:" />
            <x-form.login-inp name="password_confirmation" type="password"  required min-8/>
            <x-form.error name="password_confirmation" type="password"/>

            <button type="submit" name="submit" class="w-32 px-4 py-1 my-5 text-xl text-white duration-200 bg-gray-900 border border-black hover:bg-gray-100 hover:text-bgcolor rounded-xl">تسجيل</button>

        </form>
        <div class="flex flex-col items-center justify-center w-full gap-10 p-5 align-middle md:w-2/5 lg:w-1/3 md:p-7 rounded-b-xl md:rounded-l-xl md:rounded-br-none bg-gradient-to-bl from-cyan-400 to-blue-400">
            <p class="w-full text-2xl font-bold text-center">ألديك حساب مسبق؟</p>
            <a href="/login/create" class="block w-2/3 px-4 py-2 text-center text-white rounded-full bg-gradient-to-b from-bgcolor to-gray-800 hover:bg-bgcolor">تسجيل الدخول</a>
        </div>
    </section>
</x-layout>
