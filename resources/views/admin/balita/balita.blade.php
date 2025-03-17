<x-main-admin>
    <section class="container mx-auto my-5">
        <ul class="flex items-center text-sm ml-4 my-5">
            <li class="mr-2">
                <a href="#" class="text-gray-400 hover:text-gray-600 font-medium">Dashboard</a>
            </li>
            <li class="text-gray-600 mr-2 font-medium">/</li>
            <li class="text-gray-600 mr-2 font-medium">{{ $title }}</li>
        </ul>
        <h4 class="text-xl font-bold text-center my-4">Data Balita</h4>
        <!-- Tambah data balita -->
        <div class="flex justify-start">
            <a href="{{ route('tambah.balita') }}">
                <button class="mx-4 my-3 bg-hijautua hover:bg-hijaumuda text-white py-2 px-4 rounded-lg">
                    Tambah Data
                </button>
            </a>
            <a href="{{ route('download.template.balita') }}"
                class="block my-3 bg-yellow-400 hover:bg-orange-400 text-white py-2 px-4 rounded-lg" type="button">
                Download Template Excel
            </a>
        </div>
        <div class="relative mx-4">
            <form action="{{ route('import.balita') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input class="rounded-lg border border-gray-300 " type="file" name="file" required>
                <button class="block my-3 bg-yellow-400 hover:bg-orange-400 text-white py-2 px-4 rounded-lg"
                    type="submit">Unggah</button>
            </form>
        </div>
        <!-- End tambah data-->

        <!-- pencarian data -->
        <form method="GET">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative mx-4">
                <div
                    class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input type="text" id="table-search" name="search"
                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-6"
                    placeholder="Nama Balita / Nama Orang Tua Balita " value="{{ request('search') }}">
            </div>
        </form>
        <!-- End pencarian data -->
        @if (session('success'))
            <script>
                Swal.fire({
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    icon: 'success'
                });
            </script>
        @endif
        <!-- tabel data -->
        <div class="relative overflow-x-auto mx-5 sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class=" text-gray-700 uppercase dark:text-gray-400">
                    <tr class="bg-green-700 text-white text-center font-semibold">
                        <th scope="col" class="px-6 py-3  dark:bg-gray-800">
                            Nama Balita
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Ibu
                        </th>
                        <th scope="col" class="px-6 py-3 dark:bg-gray-800">
                            Alamat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($balita as $blt)
                        <tr class="border-b border-gray-200 dark:border-gray-700 text-center text-base">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                {{ $blt->nama }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                {{ $blt->nama_ortu }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                {{ $blt->alamat }}
                            </th>
                            <th class="px-8 py-4 mb-2 sm:mb-4 md:mb-6 lg:mb-8 bg-gray-50 dark:bg-gray-800">
                                <div class="flex gap-1">
                                    <a href="{{ route('balita.show', Crypt::encrypt($blt->id)) }}"
                                        class="py-1 px-3 bg-blue-400
                                        rounded-lg text-xs md:text-sm md:font-medium text-white dark:text-red-500
                                        hover:underline">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('balita.edit', ['nama_balita' => Str::slug($blt->nama), 'id' => Crypt::encrypt($blt->id)]) }}"
                                        class="py-1 px-3  bg-yellow-400 rounded-lg text-xs md:text-sm md:font-medium text-white dark:text-red-500 hover:underline">
                                        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </a>
                                    <a onclick="deleteConfirmation({{ $blt->id }});"
                                        class="py-1 px-3 bg-red-400 rounded-lg text-xs md:text-sm md:font-medium text-white dark:text-red-500 hover:underline">
                                        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </a>
                                    <form id="delete-form-{{ $blt->id }}"
                                        action="{{ route('balita.delete', $blt->id) }}" method="POST"
                                        style="display: none;"">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!--End Tabel  -->

        <div class="mt-4 flex justify-center ">
            {{ $balita->links('vendor.pagination.tailwind') }}

        </div>

        <!-- Modal Delete -->
        <script>
            function deleteConfirmation(id) {
                Swal.fire({
                    title: 'Apakah kamu yakin?',
                    text: "Data yang terhapus tidak bisa dikembalikan!!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Hapus'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + id).submit();
                    }
                });
            }
        </script>
    </section>
</x-main-admin>
