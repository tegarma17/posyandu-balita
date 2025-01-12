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
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.7.2-web/css/all.css') }}">
    {{-- Alpine Js --}}
    <script src="//unpkg.com/alpinejs" defer></script>

</head>

<body class="font-serif">
    {{-- Navbar --}}
    <header>
        <div class="fixed w-full">
            <nav class="py-1 bg-hijaunavbar " x-data="{ navOpen: false }">
                <div class="flex items-center justify-between px-2 ">
                    <img src="{{ asset('img/logo.svg') }}" style="width: 70px; height: auto" alt=""
                        class="gap-1">

                    <button>
                        <img @click="navOpen = ! navOpen" src="{{ asset('img/hamburger.svg') }}" class="lg:hidden">
                    </button>
                    <div class="hidden lg:block">
                        <ul class="flex justify-end items-center gap-8 ">
                            <a href="">
                                <li class="text-gray-700 font-bold text-lg">Home</li>
                            </a>
                            <a href="">
                                <li class="text-gray-700 font-bold text-lg">Keunggulan</li>
                            </a>
                            <a href="">
                                <li class="text-gray-700 font-bold text-lg">Tentang Kami</li>
                            </a>
                            <a href="">
                                <li class="text-gray-700 font-bold text-lg">Kontak</li>
                            </a>
                            <a href="">
                                <li class="text-gray-700 font-bold text-lg">Puskesmas</li>
                            </a>
                            <button class="w-32 h-11 rounded-lg text-white bg-hijautua">Login</button>
                        </ul>
                    </div>
                </div>
                <div x-show="navOpen" x-data="{ open: false }" class="w-full bg-white font-bold lg:hidden" x-show="open"
                    x-transition:enter="duration-300 ease-out"
                    x-transition:enter-start="opacity-0 -translate-y-5 scale-90"
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
        </div>
    </header>

    {{-- Hero Section --}}
    <header class="bg-hijautua max-w-screen h-[90vh] flex justify-center items-center px-4 md:px-8 pt-16">
        <div class="lg:container lg:grid lg:grid-cols-3 lg:gap-4 items-center">
            <div class=" text-white text-center lg:col-span-2 items-center">
                <h1 class="text-5xl md:text-6xl font-bold mb-4 text-center lg:text-left">Posyandu Online Puskesmas
                    Wonoayu
                </h1>
                <p class="text-lg md:text-xl mb-8 text-center lg:text-left ">Tumbuh Kembang Optimal untuk Generasi Emas
                </p> <a href="#"
                    class="bg-white font-bold text-green-700 px-11 py-3 rounded-xl hover:bg-hijaumuda hover:text-white transition duration-300">Login</a>
            </div>
        </div>
        <div class="lg:container-fluid lg:w-full lg:flex lg:justify-center">
            <div class="mb-12 w-auto hidden lg:block items-center">
                <img src="{{ asset('img/gizi.svg') }}" alt="">
            </div>
        </div>
    </header>
    <!-- Content -->

    <section class="p-8 bg-hijaunavbar">
        <h2 class="text-2xl font-bold mb-4 text-center border-b-4 mx-24 lg:mx-[83vh] border-green-900">
            Keunggulan
        </h2>
        <div class="mx-8 ">
            <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 text-center">
                <div class="bg-hijautua px-5 py-8 my-6  font-semibold rounded-xl mx-8 text-white">
                    <i class="fa-regular fa-calendar-days fa-4x"></i>
                    <div>
                        <h1 class="mt-5">
                            Jadwal Imunisasi & Perkembangan
                        </h1>
                    </div>
                </div>
                <div class="bg-hijautua px-5 py-8 my-6 font-semibold rounded-xl mx-8 text-white">
                    <i class="fa-solid fa-syringe fa-3x"></i>
                    <div>
                        <h1 class="mt-10">
                            Cek Imunisasi Balita
                        </h1>
                    </div>
                </div>
                <div class="bg-hijautua px-5 py-8 my-6 font-semibold rounded-xl mx-8 text-white">
                    <i class="fa-solid fa-chart-line fa-3x"></i>
                    <div>
                        <h1 class="mt-10">
                            Cek Tumbuh Kembang Balita
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="p-8 bg-hijaumuda text-wrap">
        <div class="text-center text-white font-bold tracking-wider ">
            <h1 class="text-2xl font-bold mb-4 text-center border-b-4 mx-24 lg:mx-[83vh] border-green-900">Tentang Kami
            </h1>
        </div>
        <p class="text-center text-white font-light">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facilis
            maxime,
            porro nihil
            illo ex sint sunt
            beatae, ratione ad, minima asperiores at maiores voluptate laborum obcaecati suscipit voluptas culpa!
            Est, alias eveniet id hic accusamus quae unde. Expedita nesciunt ea doloremque repellendus? Fuga, quos.
            In molestiae nesciunt alias expedita repudiandae!</p>
        <div class=" mt-14 text-center text-white font-bold tracking-wider ">
            <h1 class="text-2xl font-bold mb-4 text-center border-b-4 mx-24 lg:mx-[83vh] border-green-900">Visi Misi
            </h1>
        </div>
        <p class="text-center text-white font-light">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facilis
            maxime,
            porro nihil
            illo ex sint sunt
            beatae, ratione ad, minima asperiores at maiores voluptate laborum obcaecati suscipit voluptas culpa!
            Est, alias eveniet id hic accusamus quae unde. Expedita nesciunt ea doloremque repellendus? Fuga, quos.
            In molestiae nesciunt alias expedita repudiandae!</p>
    </section>

    <section class="p-8 bg-white my-10">
        <div class=" grid grid-cols-1 lg:grid-cols-3 gap-12 ">
            <div class="bg-hijautua rounded-md h-48">
                <div class="text-white text-center text-xl uppercase font-bold">
                    <i class="fa-solid fa-building fa-4x mt-4"></i>
                    <h2 class="mt-2">1+</h2>
                    <h2>Kecamatan</h2>
                </div>
            </div>
            <div class="bg-hijautua rounded-md h-48">
                <div class="text-white text-center text-xl uppercase font-bold mt-5">
                    <i class="fa-solid fa-house fa-4x mt-2"></i>
                    <h2 class="mt-2">10+</h2>
                    <h2>Desa</h2>
                </div>
            </div>
            <div class="bg-hijautua rounded-md h-48">
                <div class="text-white text-center text-xl uppercase font-bold mt-2">
                    <i class="fa-solid fa-house-medical fa-4x mt-4"></i>
                    <h2 class="mt-2">5+</h2>
                    <h2>Posyandu</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="p-8 bg-hijautua text-wrap">
        <div class="text-center text-white font-bold tracking-wider ">
            <h1 class="text-2xl font-bold mb-4 text-center border-b-4 mx-24 lg:mx-[83vh] border-white">Kontak Kami
            </h1>
        </div>
        <div class="lg:grid lg:grid-cols-6 lg:gap-4">
            <div class="col-span-3">
                <form action="">
                    <div>
                        <label for="" class="text-white">Nama</label>
                        <div class="mt-2.5">
                            <input type="text"
                                class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600"">
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="" class="text-white">Email</label>
                        <div class="mt-2.5">
                            <input type="email"
                                class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600"">
                        </div>
                        <div class="sm:col-span-2 mt-4">
                            <label for="message" class=" text-white">Message</label>
                            <div class="mt-2.5">
                                <textarea name="message" id="message" rows="4"
                                    class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600"></textarea>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button class="w-32 h-11 rounded-lg text-white bg-hijaumudaaa">Kirim</button>
                        </div>
                </form>
            </div>
        </div>
        <div class="text-white col-span-3 ">
            <div class="mt-4">
                <h2>Support :
                    <h1>@
                        <span class="ml-5"> tegarmaulanaalfaridzi@gmail.com
                        </span>
                    </h1>
                </h2>
                <h2 class="mt-2.5">&#x260f; <span class="ml-5">+6281234567890</span></h2>
            </div>
            <div class="mt-10">
                <h2 class="">Alamat : </h2>
                <i class="fa-solid fa-city mt-2.5"></i>
                <span class="ml-5 text-justify">Jl. Raya Wonoayu No.1, Popoh, Jimbaran Kulon, Kec. Wonoayu, Kabupaten
                    Sidoarjo, Jawa Timur 61261</span>
                <h2 class="mt-2.5">&#x260f; <span class="ml-5">+6281234567890</span></h2>
            </div>

        </div>
    </section>
    <footer class="p-3 bg-hijaucerah">
        <div class="text-center">Copyright © {{ date('Y') }} , Posyandu Online</div>
    </footer>
</body>

</html>
