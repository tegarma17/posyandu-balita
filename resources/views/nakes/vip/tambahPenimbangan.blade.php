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

                @if ($edit != null && $jadwal <= $edit->tanggal_penimbangan)
                    <div class="w-1/2">
                        <form class="p-4 md:p-5 " action="{{ route('vip.edit_penimbangan', $edit->id) }}"
                            method="POST">
                            @method('PUT')
                            @csrf
                            <input type="number" name="id_balita"
                                class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600  w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="" value="{{ $edit->id_balita }}">
                            <input type="number" name="id_jadwal"
                                class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600  w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="" value="{{ $edit->id_jadwal }}">
                            <div class="grid gap-4 mb-4">
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="price"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                        Penimbangan</label>
                                    <input type="date" name="tgl_penimbangan"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="" value="{{ $edit->tanggal_penimbangan }}">
                                </div>

                                <div class="col-span-2 sm:col-span-1">
                                    <label for="price"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Usia
                                        (Bulan)</label>
                                    <input id="hasil "type="text" name="usia"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="" value="{{ $edit->usia }}">

                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="category"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berat
                                        Badan (KG)</label>
                                    <input type="number" name="berat_badan" min="0" step="0.1"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="" value="{{ $edit->berat_badan }}">
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="category"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tinggi
                                        Badan (CM)</label>
                                    <input type="number" name="berat_badan" min="0" step="0.1"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="" value="{{ $editTB->tinggi_badan }}">
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="category"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                                    <select name="keterangan"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option value=""></option>
                                        <option value="N" {{ $edit->keterangan == 'N' ? 'selected' : '' }}>Naik
                                        </option>
                                        <option value="T"{{ $edit->keterangan == 'T' ? 'selected' : '' }}>Tidak
                                        </option>
                                        <option value="B"{{ $edit->keterangan == 'B' ? 'selected' : '' }}>Baru
                                        </option>
                                        <option value="O"{{ $edit->keterangan == 'O' ? 'selected' : '' }}>Tidak
                                            Timbang</option>
                                    </select>
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="category"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                        Pengukuran Tinggi Badan</label>
                                    <select name="jenis_pengukuran" id=""
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option value="berdiri"
                                            {{ $edit->jenis_pengukuran == 'berdiri' ? 'selected' : '' }}>
                                            Berdiri</option>
                                        <option value="terlentang"
                                            {{ $editTB->jenis_pengukuran == 'terlentang' ? 'selected' : '' }}>
                                            Terlentang
                                        </option>
                                    </select>
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="category"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Saran</label>
                                    <input type="text" name="saran" id="price"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="" value="{{ $edit->saran }}">
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
                @else
                    <div class="w-1/2">
                        <form class="p-4 md:p-5 " action="{{ route('vip.simpan_penimbangan') }}" method="POST">
                            @csrf
                            <input type="number" name="id_balita"
                                class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600  w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="" value="{{ $balita->id }}">
                            <input type="number" name="id_jadwal"
                                class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600  w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="" value="{{ $jadwalPosyandu->id }}">
                            <input type="number" name="berat_badan" min="0" step="0.1"
                                class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <div class="grid gap-4 mb-4">
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="price"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                        Penimbangan</label>
                                    <input type="date" name="tgl_penimbangan"
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
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berat
                                        Badan (KG)</label>
                                    <input type="number" name="berat_badan" min="0" step="0.1"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Memakai titik (.)">
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="category"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tinggi
                                        Badan (CM)</label>
                                    <input type="number" name="tinggi_badan" min="0" step="0.1"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="">
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="category"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                                    <select name="keterangan"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option value=""></option>
                                        <option value="N">Naik</option>
                                        <option value="T">Tidak</option>
                                        <option value="B">Baru</option>
                                        <option value="O">Tidak Timbang</option>
                                    </select>
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="category"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                        Pengukuran Tinggi Badan</label>
                                    <select name="jenis_pengukuran" id=""
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">

                                        <option value=""></option>
                                        <option value="berdiri">Berdiri</option>
                                        <option value="terlentang">Terlentang</option>
                                    </select>
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="category"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Saran</label>
                                    <input type="text" name="saran" id="price"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="">
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
                @endif
            </div>
            <p class=" font-bold mx-4 my-4">Data Penimbangan Balita {{ $balita->nama }}
            </p>
            @if ($rekap == null)
                <div class="relative overflow-x-auto mx-5 sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class=" text-gray-700 uppercase dark:text-gray-400">
                            <tr class="bg-green-700 text-white font-semibold">
                                <th scope="col" class="px-6 py-3  dark:bg-gray-800">
                                    Nama Balita
                                </th>
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
                                    Tinggi Badan
                                </th>
                                <th scope="col" class="px-6 py-3  dark:bg-gray-800">
                                    Status Gizi
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rekap as $hasil_penimbangan)
                                <tr class="border-b border-gray-200 dark:border-gray-700">

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
                                    <td
                                        class="px-6 py-4 text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                        {{ $hasil_penimbangan->tinggi_badan }} Cm
                                    </td>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                        BB / TB aka Belum Kelar
                                    </th>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
</x-main-admin>
