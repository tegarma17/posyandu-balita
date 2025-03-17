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
        <h4 class="text-2xl font-bold text-center my-4">Rekap Penimbangan Balita </h4>
        <div class="container mx-auto py-8">
            <div class=" bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 ">
                            <dt class="text-sm font-semibold text-gray-500 ">NIK Anak:</dt>
                            <dd class=" text-base font-medium  text-gray-900 sm:mt-0 sm:col-span-2">

                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-semibold text-gray-500 ">Nama Balita :</dt>
                            <dd class=" text-base font-medium  text-gray-900 sm:mt-0 sm:col-span-2">

                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-semibold text-gray-500 ">Tanggal Lahir :</dt>
                            <dd class=" text-base font-medium  text-gray-900 sm:mt-0 sm:col-span-2">

                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-semibold text-gray-500 ">Jenis Kelamin :</dt>
                            <dd class=" text-base font-medium  text-gray-900 sm:mt-0 sm:col-span-2">

                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-semibold text-gray-500 ">Nama Orang Tua :</dt>
                            <dd class=" text-base font-medium  text-gray-900 sm:mt-0 sm:col-span-2">

                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-semibold text-gray-500 ">Alamat :</dt>
                            <dd class=" text-base font-medium  text-gray-900 sm:mt-0 sm:col-span-2">

                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
        @if ($rekap == null)
            <div class="relative overflow-x-auto mx-5 sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class=" text-gray-700 uppercase dark:text-gray-400">
                        <tr class="bg-green-700 text-white font-semibold">
                            <th scope="col" class="px-6 py-3">
                                Tgl Penimbangan
                            </th>
                            <th scope="col" class="px-6 py-3  dark:bg-gray-800">
                                Usia
                            </th>
                            <th scope="col" class="px-6 py-3  dark:bg-gray-800">
                                Berat Badan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Ket
                            </th>
                            <th scope="col" class="px-6 py-3  dark:bg-gray-800">
                                Status Gizi
                            </th>
                            <th scope="col" class="px-6 py-3  dark:bg-gray-800">
                                Saran
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-200 dark:border-gray-700 ">
                            <th scope="row"
                                class="px-6 py-4 font-medium  text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                            </th>
                            <td class="px-6 py-4">
                                Belum Ada rekap penimbangan
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @else
            <div class="relative overflow-x-auto mx-5 sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class=" text-gray-700 uppercase dark:text-gray-400">
                        <tr class="bg-green-700 text-white font-semibold">
                            <th scope="col" class="px-6 py-3">
                                Tgl Penimbangan
                            </th>
                            <th scope="col" class="px-6 py-3  dark:bg-gray-800">
                                Usia
                            </th>

                            <th scope="col" class="px-6 py-3  dark:bg-gray-800">
                                Berat Badan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Ket
                            </th>
                            <th scope="col" class="px-6 py-3  dark:bg-gray-800">
                                Status Gizi
                            </th>
                            <th scope="col" class="px-6 py-3  dark:bg-gray-800">
                                Saran
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rekap as $hasil_penimbangan)
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                    {{ $hasil_penimbangan->balita->nama }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $hasil_penimbangan->tanggal_penimbangan }}
                                </td>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                    {{ $hasil_penimbangan->usia }}
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                    {{ $hasil_penimbangan->berat_badan }} Kg
                                </th>
                                <td class="px-6 py-4">
                                    {{ $hasil_penimbangan->keterangan }}
                                </td>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                    {{ $hasil_penimbangan->status_gizi }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $hasil_penimbangan->saran }}
                                </td>
                                <td
                                    class="flex flex-col md:flex-row md:space-x-2 space-y-2 md:space-y-0 px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                    <a href="{{ route('vip.rekap_penimbangan', $hasil_penimbangan->id) }}"
                                        class="px-3 py-1 bg-yellow-400 rounded-lg font-medium text-white dark:text-red-500 hover:underline">Rekap</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
</x-main-admin>
