<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <title>Posyandu Online</title>
    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mina:wght@400;700&display=swap" rel="stylesheet">
    {{-- Alpine Js --}}
    <script src="//unpkg.com/alpinejs" defer></script>

</head>

<body class="font-serif">
    {{-- Navbar --}}
    <nav class="py-1 bg-hijaunavbar " x-data="{ navOpen: false }">
        <div class="flex items-center justify-between px-2 ">
            <img src="{{ asset('img/logo.svg') }}" style="width: 70px; height: auto" alt="" class="gap-1">

            <img @click="navOpen = ! navOpen" src="{{ asset('img/hamburger.svg') }}" class="lg:hidden">
            <div class="hidden lg:block">
                <ul class="flex justify-end items-center gap-8 ">
                    <li class="text-gray-700 font-bold text-lg">Home</li>
                    <li class="text-gray-700 font-bold text-lg">Keunggulan</li>
                    <li class="text-gray-700 font-bold text-lg">Tentang Kami</li>
                    <li class="text-gray-700 font-bold text-lg">Kontak</li>
                    <li class="text-gray-700 font-bold text-lg">Puskesmas</li>
                    <button class="w-32 h-11 rounded-lg text-white bg-hijautua">Login</button>
                </ul>
            </div>
        </div>
        <div x-show="navOpen" x-data="{ open: false }" class="w-full bg-white font-bold lg:hidden" x-show="open"
            x-transition:enter="duration-300 ease-out" x-transition:enter-start="opacity-0 -translate-y-5 scale-90"
            x-transition:enter-end="opacity-100 -translate-y-0 scale-100">
            <ul class="my-2 p-2">
                <li class="my-2">
                    <a class="flex justify-center flex-col items-center gap-1" href="">Home</a>
                </li>
                <li class="my-2">
                    <a class="flex justify-center flex-col items-center gap-1" href="">Keunggulan</a>
                </li>
                <li class="my-2">
                    <a class="flex justify-center flex-col items-center gap-1" href="">Tentang Kami</a>
                </li>
                <li class="my-2">
                    <a class="flex justify-center flex-col items-center gap-1" href="">Kontak</a>
                </li>
                <li class="my-2">
                    <a class="flex justify-center flex-col items-center gap-1" href="">Puskesmas</a>
                </li>
                <button class="w-full h-11 rounded-lg bg-hijautua text-white font-bold">Login</button>
            </ul>
        </div>
    </nav>

    {{-- Hero Section --}}
    <header class="bg-hijautua max-w-screen h-[90vh] flex justify-center items-center px-4 md:px-8 pt-16">
        <div class="lg:container lg:grid lg:grid-cols-3 lg:gap-4 items-center  bg-red-500">
            <div class=" text-white text-center lg:col-span-2 items-center">
                <h1 class="text-5xl md:text-6xl font-bold mb-4 text-center lg:text-left">Posyandu Online Puskesmas
                    Wonoayu
                </h1>
                <p class="text-lg md:text-xl mb-8 text-center lg:text-left ">Tumbuh Kembang Optimal untuk Generasi Emas
                </p> <a href="#"
                    class="bg-white  text-green-700 px-11 py-3 rounded-xl hover:bg-hijaumuda hover:text-green-700 transition duration-300">Login</a>
            </div>
        </div>
        <div class="lg:container-fluid lg:w-full lg:flex lg:justify-center">
            <div class="mb-12 w-auto hidden lg:block items-center">
                <img src="{{ asset('img/gizi.svg') }}" alt="">
            </div>
        </div>
    </header>
    <!-- Content -->

    <section class="p-8 bg-white">
        <h2 class="text-2xl font-bold mb-4 text-center">Keunggulan</h2>
        <p class="text-lg mb-4">This is an example of a hero section with a fixed navbar using Tailwind CSS. Scroll down
            to see the navbar remains at the top.</p> <!-- Add more content here to show the scrolling effect -->
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum vestibulum.
            Cras venenatis euismod malesuada. Curabitur pulvinar nibh eu...</p>
        <!-- Repeat or add more content to make the page longer -->
    </section>


</body>

</html>
