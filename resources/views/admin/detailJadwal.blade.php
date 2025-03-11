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
        @if (session('error'))
            <script>
                Swal.fire({
                    title: 'Gagal!',
                    text: '{{ session('error') }}',
                    icon: 'error'
                });
            </script>
        @endif

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
                    @foreach ($coba as $jdwl)
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

                            <th class="px-8 py-4 mb-2 sm:mb-4 md:mb-6 lg:mb-8 bg-gray-50 dark:bg-gray-800">
                                <div class="flex gap-1">
                                    <a href="{{ route('jadwal.detailPetugas', Crypt::encrypt($jdwl->id_psynd)) }}"
                                        class="py-1 px-3  bg-blue-400 rounded-lg text-xs md:text-sm md:font-medium text-white dark:text-red-500 hover:underline"><i
                                            class="fas fa-eye"></i></a>
                                    <a
                                        class="py-1 px-3  bg-yellow-400 rounded-lg text-xs md:text-sm md:font-medium text-white dark:text-red-500 hover:underline"><button
                                            data-modal-target="crud-modal" data-modal-toggle="crud-modal"><i
                                                class="fas fa-edit"></i>
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
        <div class="mt-4 flex justify-center ">
            {{ $coba->links('vendor.pagination.tailwind') }}
        </div>
        <div id="crud-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Jadwal Baru
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form action="{{ route('jadwal.update') }}" class="p-4 md:p-5" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="text" name="selesai_posyandu" id="price" hidden
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600  w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="" value="{{ $cek->selesai_posyandu }}">
                        <input type="text" name="id_psynd" id="price" hidden
                            class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600  w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="" value="{{ $cek->id_psynd }}">
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2 ">
                                <label for="category"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mulai
                                    Posyandu</label>
                                <input type="datetime-local" name="jadwal_posyandu" id="price"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="" value="{{ old('jadwal_posyandu', $cek->jadwal_posyandu) }}">
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
                            Tambah Data
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-main-admin>
