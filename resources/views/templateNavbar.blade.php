<!-- start: Main -->
<x-main-admin>
    <div class="my-4 mx-5">
        @if (Auth::user()->role_id == '1')
            <div class="w-1/2 px-4 py-6 bg-hijaumudaaa text-white rounded-lg">
                <div class="flex justify-start px-3 py-5 gap-3">
                    <div class="w-1/4">
                        <img src="{{ asset('img/admin.png') }}">
                    </div>
                    <div class="mx-3 ">
                        <h1 class="text-2xl font-bold my-4 mx-5">
                            Selamat Datang, {{ Auth::user()->username }}
                        </h1>
                        <div class="text-base mx-4 font-normal ">
                            <p>Selamat datang,{{ Auth::user()->username }} anda login sebagai Admin </p>
                            <p>Anda dapat mengatur Data Master </p>
                        </div>
                    </div>
                </div>
            </div>
        @elseif (Auth::user()->role_id == '2' || Auth::user()->role_id == '3')
            <div class="flex justify-between gap-3">
                <div class="w-1/2 px-4 py-6 bg-hijaumudaaa text-white rounded-lg">
                    <div class="flex justify-start px-3 py-5 gap-3">
                        <div class="w-1/4  mt-5">
                            <img src="{{ asset('img/admin.png') }}">
                        </div>
                        <div class="mx-3 ">
                            <h1 class="text-2xl font-bold my-4 mx-5">
                                Selamat Datang {{ Auth::user()->nakes->nama }}
                            </h1>
                            <div class="text-base mx-4 font-normal ">
                                <p>Selamat datang {{ Auth::user()->nakes->nama }}, anda login sebagai Tenaga Kesehatan
                                </p>
                                <p>Anda bertugas sebagai penginputan vaksin imunisai penimbangan balita </p>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($jadwal->jadwal_posyandu == now())
                    <div class="w-1/2 px-2 py-6 bg-green-500 text-white rounded-lg content-center">
                        <h1 class="text-lg font-bold">Anda Memiliki jadwal Posyandu Hari ini
                            <h3>{{ $dateFormat }}</h3>
                            <h3>{{ $jadwal->posyandu->alamat }}</h3>
                        </h1>
                    </div>
                @elseif ($jadwal->jadwal_posyandu > now())
                    <div class="w-1/2 px-2 py-6 bg-yellow-500 text-white rounded-lg content-center">
                        <h1 class="text-lg font-bold">Anda Memiliki jadwal Posyandu yang akan datang
                            <h3>{{ $dateFormat }}</h3>
                            <h3>{{ $jadwal->posyandu->alamat }}</h3>
                        </h1>
                    </div>
                @else
                    <div class="w-1/2 px-2 py-6 bg-orange-500 text-white rounded-lg content-center text-center">
                        <h1 class="text-lg font-bold">Anda tidak memiliki jadwal posyandu</h1>
                    </div>
                @endif
            </div>
        @else
            <h1 class="text-2xl font-bold my-4 mx-5">
                Selamat Datang Adik, {{ Auth::user()->balita->nama }}
            </h1>
            <div class="flex justify-center md:justify-start sm:justify-start gap-4 my-4 mx-5">
                <div class="w-1/4 px-4 py-6 text-center text-white rounded-lg bg-green-700">
                    <a href="{{ route('jadwal.balita') }}">
                        <i class="fa-solid fa-calendar fa-3x"></i>
                        <h3 class="font-bold text-base mt-4">Jadwal Tersedia</h3>
                        <h3 class="font-bold text-base mt-4">9+</h3>
                    </a>
                </div>
                <div class="w-1/4 px-4 py-6 text-center text-white rounded-lg bg-green-700">
                    <a href="">
                        <i class="fa-solid fa-calendar fa-3x"></i>
                        <h3 class="font-bold text-base mt-4">Laporan Anak</h3>
                    </a>
                </div>
                <div class="w-1/2 px-2 py-6 bg-yellow-400 text-white rounded-lg content-center text-center">
                    @if ($antrian != null)
                        <h3>Anda Memiliki jadwal Posyandu
                            <p class="font-bold">{{ $dateFormat }}</p>
                        </h3>
                        <h3>No Antri
                            <p class="text-xl font-bold">{{ $antrian->no_antri }}</p>
                        </h3>
                        <h3>yang berlokasi di
                            <p class="font-bold"> {{ $antrian->jadwal->posyandu->alamat }}</p>
                        </h3>
                    @else
                        <h1 class="text-lg font-bold">Anda tidak memiliki jadwal posyandu</h1>
                    @endif
                </div>
            </div>
        @endif
    </div>
</x-main-admin>
<!-- end: Main -->
