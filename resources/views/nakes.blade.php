<x-main-admin>

    <section class="container mx-auto my-5">
        <ul class="flex items-center text-sm ml-4 my-5">
            <li class="mr-2">
                <a href="#" class="text-gray-400 hover:text-gray-600 font-medium">Dashboard</a>
            </li>
            <li class="text-gray-600 mr-2 font-medium">/</li>
            <li class="text-gray-600 mr-2 font-medium">{{ $title }}</li>
        </ul>
        <h4 class="text-2xl font-bold text-center my-4">Data Tenaga Kesehatan</h4>
        <!-- Modal toggle -->
        <div class="flex justify-start">
            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                class="block mx-4 my-3 bg-hijautua hover:bg-hijaumuda text-white py-2 px-4 rounded-lg" type="button">
                Tambah Tenaga Kesehatan Baru
            </button>
            <a href="{{ route('template.nakes') }}"
                class="block my-3 bg-yellow-400 hover:bg-orange-400 text-white py-2 px-4 rounded-lg" type="button">
                Download Template Excel
            </a>
        </div>
        <div class="relative mx-4">
            <form action="{{ route('import.nakes') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input class="rounded-lg border border-gray-300 " type="file" name="file" required>
                <button class="block my-3 bg-yellow-400 hover:bg-orange-400 text-white py-2 px-4 rounded-lg"
                    type="submit">Unggah</button>
            </form>
        </div>
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
                    placeholder="Nama Tenaga Kesehatan" value="{{ request('search') }}">
            </div>
            <div class="flex justify-start">
                <button class="block mx-4  bg-hijautua hover:bg-hijaumuda text-white py-2 px-4 rounded-lg"
                    id="resetButton" type="submit">Cari</button>
                <a href="{{ route('nakes.index') }}"class="block bg-yellow-400 hover:bg-orange-400 text-white py-2 px-4 rounded-lg"
                    id="resetButton" type="submit">Reset Pencarian</a>
            </div>
        </form>
        @if (session('success'))
            <script>
                Swal.fire({
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    icon: 'success'
                });
            </script>
        @endif
        <!-- Tabel data -->
        <div class="relative overflow-x-auto mx-5 sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class=" text-gray-700 uppercase dark:text-gray-400">
                    <tr class="bg-green-700 text-white font-semibold">
                        <th scope="col" class="px-6 py-3  dark:bg-gray-800">
                            Kode Tenaga Kesehatan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Nakes
                        </th>
                        <th scope="col" class="px-6 py-3">
                            No HP
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nakes as $nks)
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                {{ $nks->kd_nakes }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $nks->nama }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $nks->no_hp }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-3 items-center text-white ">
                                    <form action="{{ route('nakes.destroy', $nks->id) }}"
                                        onsubmit="return confirmDelete(event)">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 py-3 px-6 rounded-lg dark:text-red-500 hover:underline transition duration-150 ease-in-out">Delete</button>
                                        <a href="{{ route('nakes.edit', $nks->id) }}"
                                            class="bg-yellow-400 py-3 px-6 mb-3 rounded-lg dark:text-red-500 hover:underline">Edit</a>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <!-- End Tabel -->
        <div class="mt-4 flex justify-center ">
            {{ $nakes->links('vendor.pagination.tailwind') }}

        </div>
        <!-- Modal Tambah Tenaga Kesehatan -->
        <div id="crud-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Tenaga Kesehatan Baru
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

                    <form class="p-4 md:p-5" action="{{ route('nakes.simpan') }}" method="POST">
                        @csrf
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2 ">
                                <label for="price"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                                <input type="number" name="nik" id="nik"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="" required="">
                            </div>

                            <div class="col-span-2 sm:col-span-1">
                                <label for="price"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                <input type="text" name="nama" id="nama"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="jk"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                    Kelamin</label>
                                <select id="jk" name="jns_klmn"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option selected="">Jenis Kelamin</option>
                                    <option value="l">Laki - Laki</option>
                                    <option value="p">Perempuan</option>
                                </select>
                            </div>

                            <div class="col-span-2">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                <input type="text" name="alamat" id="alamat"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Type product name" required="">
                            </div>
                            <div class="col-span-2">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomer
                                    HP</label>
                                <input type="number" name="no_hp" id="no_hp"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Type product name" required="">
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
        <!-- End Modal  -->


    </section>

    <script>
        function confirmDelete(event) {
            event.preventDefault(); // Mencegah pengiriman form
            const form = event.target;
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
                    form.submit(); // Kirim form setelah konfirmasi
                }
            });
        }
    </script>
</x-main-admin>
