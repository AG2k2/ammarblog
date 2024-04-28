<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@500&display=swap" rel="stylesheet">
    <title>AmmarBlog</title>
    <script>
        function openNav() {
        document.getElementById("mob-nav").style.width = "100%";
        };

        function closeNav() {
        document.getElementById("mob-nav").style.width = "0%";
        };
    </script>
    <script>
        const btnScrollToTop = document.querySelector(".btnScrollToTop");
        // scroll to top of page when button clicked
        btnScrollToTop.addEventListener("click", e => {
        window.scrollTo({
            top: 0,
            left: 0,
            behavior: "smooth"
        });
        });

        // toggle 'scroll to top' based on scroll position
        window.addEventListener('scroll', e => {
        btnScrollToTop.style.display = window.scrollY > 20 ? 'block' : 'none';
        });
    </script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <title>AmmarInno</title>
    @vite('resources/css/app.css')
</head>
<body class="w-full h-full min-h-screen bg-bgcolor font-theme scrollbar-none md:scrollbar-thin scrollbar-thumb-cyan-400 " style="direction: rtl">

    <nav class="fixed left-0 z-50 top-1/2">
        <a href="https://www.facebook.com/profile.php?id=100009347625668" class="z-50 flex items-center justify-center w-10 h-10 text-2xl text-white bg-blue-600 rounded-r-lg opacity-100 md:text-3xl md:w-12 md:h-12 hover:opacity-80"><i class="fa fa-facebook "></i></a>
    </nav>
    <x-nav-bar />

    @if (isset($header))
        {{ $header }}
    @endif


    <main class="w-full min-h-full">

        {{$slot}}

    </main>

    @if (session()->get('success'))
        <div x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 3000)"
            x-show="show"
            class="fixed right-0 z-50 w-full px-12 text-base text-center text-black opacity-95 rounded-xl bottom-3"
            >
            <p class="w-full px-6 py-4 m-auto bg-gray-100 rounded-xl">{{ session('success') }}</p>
        </div>
    @endif

</body>
</html>
