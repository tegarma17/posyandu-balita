<x-main-admin>

    <section class="container mx-auto my-5">
        <ul class="flex items-center text-sm ml-4 my-5">
            <li class="mr-2">
                <a href="/dshbrd" class="text-gray-400 hover:text-gray-600 font-medium">Dashboard</a>
            </li>
            <li class="text-gray-600 mr-2 font-medium">/ </li>
            <a href="{{ route('jadwal.index') }}">
                <li class="text-gray-400 hover:text-gray-600 font-medium mr-2">Jadwal Posyandu</li>
            </a>
            <li class="text-gray-600 mr-2 font-medium">/</li>
            <li class="text-gray-600 mr-2 font-medium">Edit Jadwal Posyandu</li>
        </ul>
        <a href="{{ route('jadwal.index') }}"><button
                class="mx-4  bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg">
                Kembali
            </button></a>
        <h4 class="text-2xl font-bold text-center my-4">Jadwal Posyandu</h4>

        <form action="{{ route('jadwal.ubah', $jadwal->id) }}" class="p-4 md:p-5" method="POST">
            @csrf
            @method('PUT')
            <div class="grid gap-4 mb-4 grid-cols-2">
                <div class="col-span-2 sm:col-span-1">
                    <label for="price"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                    <select id="kecamatan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected="">Pilih Kecamatan</option>
                        @foreach ($kecamatan as $kcmtn)
                            <option value="{{ $kcmtn->kd_kcmtn }}">{{ $kcmtn->nm_kcmtn }}</option>
                        @endforeach
                    </select>
                    </select>
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="price"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Desa</label>
                    <select id="desa"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected="">Pilih Desa</option>

                    </select>
                </div>
                <div class="col-span-2">
                    <label for="category"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Posyandu</label>
                    <select id="posyandu" name="id_psynd"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @foreach ($posyandu as $psynd)
                            <option value="{{ $psynd->id }}" {{ $jadwal->id_psynd == $psynd->id ? 'selected' : '' }}>
                                {{ $psynd->nm_psynd }}
                            </option>
                        @endforeach

                    </select>
                </div>
                @if ($jadwal->nakes->user->role_id == '2')
                    <div class="col-span-2 ">
                        <label for="price"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kader</label>
                        <select id="kader" name="id_kader" style="width: 100%"
                            class="form-multiselect block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @foreach ($kader as $kdr)
                                <option value="{{ $kdr->id }}"
                                    {{ $jadwal->id_nakes == $kdr->id ? 'selected' : '' }}>
                                    {{ $kdr->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @elseif ($jadwal->nakes->user->role_id == '3')
                    <div class="col-span-2 ">
                        <label for="price"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tenaga
                            Kesehatan</label>
                        <select id="nakes" name="id_nakes" style="width: 100%"
                            class="form-multiselect block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @foreach ($nakes as $nks)
                                <option value="{{ $nks->id }}"
                                    {{ $jadwal->id_nakes == $nks->id ? 'selected' : '' }}>
                                    {{ $nks->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif
                <div class="col-span-2 ">
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mulai
                        Posyandu</label>
                    <input type="datetime-local" name="jadwal_posyandu" id="price"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="" value="{{ old('jadwal_posyandu', $jadwal->jadwal_posyandu) }}">
                </div>
                <div class="col-span-2 ">
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selesai
                        Posyandu</label>
                    <input type="datetime-local" name="selesai_posyandu" id="price"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="" value="{{ old('selesai_posyandu', $jadwal->selesai_posyandu) }}">
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
                Simpan Data
            </button>
        </form>
    </section>

    <script>
        $(document).ready(function() {
            $('#nakes').select2();
        });
        $(document).ready(function() {
            $('#kader').select2();
        });
    </script>
</x-main-admin>
