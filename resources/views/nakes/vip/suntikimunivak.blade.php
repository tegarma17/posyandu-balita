<x-main-admin>
    <section class="container mx-auto my-5">
        <ul class="flex items-center text-sm ml-4 my-5">
            <li class="mr-2">
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-gray-600 font-semibold">Dashboard</a>
            </li>
            <li class="text-gray-600 mr-2 font-semibold">/</li>
            <a href="{{ route('penimbangan.index') }}">
                <li class="text-gray-400 hover:text-gray-600 font-semibold mr-2">Vaksin & Imunsisasi </li>
            </a>
            <li class="text-gray-600 mr-2 font-semibold">/</li>
            <li class="text-gray-600 mr-2 font-semibold">Input Vaksin & Imunsisasi Balita</li>
        </ul>
        <a href="{{ route('vakimun.index') }}"><button
                class="mx-4  bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg">
                Kembali
            </button></a>
        <h4 class="text-2xl font-bold text-center my-4">Vaksin & Imunsisasi Balita {{ $balita->nama }}</h4>
        <div class="container mx-auto py-8">
            <div class="flex bg-white shadow overflow-hidden sm:rounded-lg">
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
                            <dt class="text-sm font-semibold text-gray-500 ">Alamat :</dt>
                            <dd class=" text-base font-medium  text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $balita->alamat }}
                            </dd>
                        </div>
                    </dl>
                </div>
                <div class="w-1/2">
                    <form class="p-4 md:p-5 " action="{{ route('vip.simpan_vakimun') }}" method="POST">
                        @csrf
                        <input type="number" name="id_balita"
                            class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600  w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="" value="{{ $balita->id }}">
                        <input type="number" name="id_jadwal"
                            class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600  w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="" value="{{ $jadwalPosyandu->id }}">
                        <div class="grid gap-4 mb-4">
                            <div class="col-span-2 sm:col-span-1">
                                <label for="price"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                    Vaksin/Imunisasi</label>
                                <input type="date" name="tanggal_imunivak"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="price"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Usia
                                    (Bulan)</label>
                                <input id="hasil "type="text" name="usia"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="" value="{{ $usia->usia }}">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="category"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                    Vaksin/Imunisasi</label>
                                <select id="imunivak" name="id_imunivak"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value=""></option>
                                    @foreach ($vaksin as $vksin)
                                        <option value="{{ $vksin->id }}">{{ $vksin->nama_vksn_imun }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit"
                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
            <p class=" font-bold mx-4 my-4">Data Vaksin/Imunisasi Balita {{ $balita->nama }}
            </p>
            <div class="relative overflow-x-auto mx-5 sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class=" text-gray-700 uppercase dark:text-gray-400">
                        <tr class="bg-green-700 text-white font-semibold">
                            <th scope="col" class="px-6 py-3">
                                Tgl Imunisasi / Vaksin
                            </th>
                            <th scope="col" class="px-6 py-3  dark:bg-gray-800">
                                Usia
                            </th>
                            <th scope="col" class="px-6 py-3  dark:bg-gray-800">
                                Jenis Vaksin / Imunisasi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($rekap == null)
                            <tr class="border-b border-gray-200 dark:border-gray-700 ">
                                <th scope="row"
                                    class="px-6 py-4 font-medium  text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                    Belum Ada data
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium  text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                    Belum Ada data
                                </th>
                                <td class="px-6 py-4">
                                    Belum Ada data
                                </td>
                            </tr>
                        @else
                            @foreach ($rekap as $hasil)
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                        {{ $hasil->tanggal_imunivak }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $hasil->usia }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $hasil->nama_imunivak }}
                                    </td>

                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#imunivak').select2();
            });
        </script>
</x-main-admin>
