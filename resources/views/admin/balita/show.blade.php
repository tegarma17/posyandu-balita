<x-main-admin>
    <section class="container mx-auto my-5">
        <ul class="flex items-center text-sm ml-4 my-5">
            <li class="mr-2">
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-gray-600 font-semibold">Dashboard</a>
            </li>
            <li class="text-gray-600 mr-2 font-semibold">/ </li>
            <a href="{{ route('balita.index') }}">
                <li class="text-gray-400 hover:text-gray-600 font-semibold mr-2"></li>
            </a>
            <li class="text-gray-600 mr-2 font-semibold">/</li>
            <li class="text-gray-600 mr-2 font-semibold">Data Balita</li>
        </ul>
        <h4 class="text-2xl font-bold text-center my-4">Detail Data Balita</h4>
        <div class="container mx-auto py-8">
            <a href="{{ route('balita.index') }}"><button
                    class="mx-4 my-2 bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg">
                    Kembali
                </button></a>
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="flex justify-start px-4 py-5 sm:px-6">
                    <div class="border-t border-gray-200">
                        <dl>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 ">
                                <dt class="text-sm font-semibold text-gray-500 ">NIK:</dt>
                                <dd class=" text-base font-medium  text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $balita->nik }}
                                </dd>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-semibold text-gray-500 ">Nama :</dt>
                                <dd class=" text-base font-medium  text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $balita->nama }}
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
                                <dt class="text-sm font-semibold text-gray-500 ">Tempat, Tanggal Lahir :</dt>
                                <dd class=" text-base font-medium  text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $balita->tmpt_lahir }},
                                    {{ Carbon\Carbon::parse($balita->tgl_lahir)->translatedFormat('d F Y') }}
                                </dd>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-semibold text-gray-500 ">Nama Orang Tua :</dt>
                                <dd class=" text-base font-medium  text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $balita->nama_ortu }}
                                </dd>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-semibold text-gray-500 ">No Handphone Orang Tua :</dt>
                                <dd class=" text-base font-medium  text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $balita->no_hp_ortu }}
                                </dd>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-semibold text-gray-500 ">Alamat :</dt>
                                <dd class=" text-base font-medium  text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $balita->alamat }}
                                </dd>
                            </div>
                        </dl>
                    </div>
                    <div class="border-t border-gray-200">
                        <dl>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 ">
                                <dt class="text-sm font-semibold text-gray-500 ">Anak Ke:</dt>
                                <dd class=" text-base font-medium  text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $balita->anak_ke }}
                                </dd>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-semibold text-gray-500 ">Berat Badan Awal :</dt>
                                <dd class=" text-base font-medium  text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $balita->bb_awal }} Kg
                                </dd>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-semibold text-gray-500 ">Tinggi Badan Awal :</dt>
                                <dd class=" text-base font-medium  text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $balita->tb_awal }} Cm
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
</x-main-admin>
