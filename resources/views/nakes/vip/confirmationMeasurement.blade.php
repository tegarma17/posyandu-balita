<x-main-admin>
    <section class="container mx-auto my-5">
        <ul class="flex items-center text-sm ml-4 my-5">
            <li class="mr-2">
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-gray-600 font-semibold">Dashboard</a>
            </li>
            <li class="text-gray-600 mr-2 font-semibold">/</li>
            <a href="{{ route('penimbangan.index') }}">
                <li class="text-gray-400 hover:text-gray-600 font-semibold mr-2">Penimbangan </li>
            </a>
            <li class="text-gray-600 mr-2 font-semibold">/</li>
            <li class="text-gray-600 mr-2 font-semibold">Input Penimbangan Balita</li>
        </ul>
        <a href="{{ route('penimbangan.index') }}"><button
                class="mx-4  bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg">
                Kembali
            </button></a>
        <h4 class="text-2xl font-bold text-center my-4">Penimbangan Balita {{ $balita->nama }}</h4>
        <div class="container mx-auto py-8">
            <div class="flex justify-around bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 ">
                            <dt class="text-sm font-semibold text-gray-500 ">NIK Anak:</dt>
                            <dd class=" text-base font-medium  text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $balita->nik }}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-semibold text-gray-500 ">Nama Balita :</dt>
                            <dd class=" text-base font-medium  text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $balita->nama }}
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-semibold text-gray-500 ">Tanggal Lahir :</dt>
                            <dd class=" text-base font-medium  text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $balita->tgl_lahir }}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-semibold text-gray-500 ">Jenis Kelamin :</dt>
                            <dd class=" text-base font-medium  text-gray-900 sm:mt-0 sm:col-span-2">
                                @if ($balita->jns_klmn == 'l')
                                    Laki - Laki
                                @else
                                    Perempuan
                                @endif
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-semibold text-gray-500 ">Nama Orang Tua :</dt>
                            <dd class=" text-base font-medium  text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $balita->nama_ortu }}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-semibold text-gray-500 ">Usia :</dt>
                            <dd class=" text-base font-medium  text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $inputTb['usia'] }} Bulan
                            </dd>
                        </div>
                    </dl>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 ">
                            <dt class="text-sm font-semibold text-gray-500 ">Berat Badan Sebelumnya:</dt>
                            <dd class=" text-base font-medium  text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $prevWeightMessage }}
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 ">
                            <dt class="text-sm font-semibold text-gray-500 ">Berat Badan:</dt>
                            <dd class=" text-base font-medium  text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $inputBb['berat_badan'] }} Kg
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 ">
                            <dt class="text-sm font-semibold text-gray-500 ">Status:</dt>
                            <dd class=" text-base font-medium  text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $inputBb['status_gizi'] }}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-semibold text-gray-500 ">Tinggi Badan Sebelumnya:</dt>
                            <dd class=" text-base font-medium  text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $prevHeightMessage }}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-semibold text-gray-500 ">Tinggi Badan :</dt>
                            <dd class=" text-base font-medium  text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $inputTb['tinggi_badan'] }} Cm
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-semibold text-gray-500 ">Status :</dt>
                            <dd class=" text-base font-medium  text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $inputTb['status_gizi'] }}
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-semibold text-gray-500 ">Tanggal Pengukuran :</dt>
                            <dd class=" text-base font-medium  text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $inputTb['tanggal_pengukuran'] }}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-semibold text-gray-500 ">Keterangan</dt>
                            <dd class=" text-base font-medium  text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $inputBb['keterangan'] }}
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-semibold text-gray-500 ">Saran :</dt>
                            <dd class=" text-base font-medium  text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $inputBb['saran'] }}
                            </dd>
                        </div>
                    </dl>
                    <form action="{{ route('vip.savePenimbangan') }}" method="post">
                        @csrf
                        <button type="submit"
                            class="m-3 text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-main-admin>
