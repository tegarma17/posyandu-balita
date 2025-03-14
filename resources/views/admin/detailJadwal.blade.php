<x-main-admin>
    <section class="container mx-auto my-5">
        <ul class="flex items-center text-sm ml-4 my-5">
            <li class="mr-2">
                <a href="#" class="text-gray-400 hover:text-gray-600 font-medium">Dashboard</a>
            </li>
            <li class="text-gray-600 mr-2 font-medium">/</li>
            <li class="text-gray-600 mr-2 font-medium">{{ $title }}</li>
        </ul>
        <h4 class="text-2xl font-bold text-center my-4">Jadwal Posyandu</h4>
        <a href="{{ route('jadwal.index') }}"><button
                class="block mx-4 my-3 bg-yellow-500 hover:bg-hijaumuda text-white py-2 px-4 rounded-lg" type="button">
                Kembali
            </button>
        </a>

        <!--Tabel Data  -->
        <div class="relative overflow-x-auto mx-5 sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class=" text-gray-700 uppercase dark:text-gray-400">
                    <tr class="bg-green-700 text-white font-semibold">
                        <th scope="col" class="px-6 py-3  dark:bg-gray-800">
                            Kecamatan
                        </th>
                        <th scope="col" class="px-6 py-3  dark:bg-gray-800">
                            Desa
                        </th>
                        <th scope="col" class="px-6 py-3  dark:bg-gray-800">
                            Posyandu
                        </th>
                        <th scope="col" class="px-6 py-3  dark:bg-gray-800">
                            Action
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwalData as $jdwl)
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                {{ $jdwl->posyandu->desa->kecamatan->nm_kcmtn }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                {{ $jdwl->posyandu->desa->nm_desa }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                {{ $jdwl->posyandu->nm_psynd }}
                            </th>
                            <input type="text" name="jadwal_posyandu" id="price" hidden placeholder=""
                                value="{{ $jdwl->jadwal_posyandu }}">
                            <th class="px-8 py-4 mb-2 sm:mb-4 md:mb-6 lg:mb-8 bg-gray-50 dark:bg-gray-800">
                                <div class="flex gap-1">
                                    <a href="{{ route('jadwal.detailPetugas', ['jadwal_posyandu' => $jdwl->jadwal_posyandu, 'id_psynd' => $jdwl->id_psynd]) }}"
                                        class="py-1 px-3  bg-blue-400 rounded-lg text-xs md:text-sm md:font-medium text-white dark:text-red-500 hover:underline"><i
                                            class="fas fa-eye"></i></a>
                                    <a
                                        class="py-1 px-3  bg-yellow-400 rounded-lg text-xs md:text-sm md:font-medium text-white dark:text-red-500 hover:underline"><button
                                            data-modal-target="crud-modal" data-modal-toggle="crud-modal"><i
                                                class="fas fa-edit"></i>
                                        </button>
                                    </a>
                                    <a
                                        class="py-1 px-3 bg-red-400 rounded-lg text-xs md:text-sm md:font-medium text-white dark:text-red-500 hover:underline"><button
                                            data-modal-target="crud-modal" data-modal-toggle="crud-modal"><i
                                                class="fas fa-trash"></i>
                                        </button>
                                    </a>
                                </div>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- end Tabel Data -->


    </section>
</x-main-admin>
