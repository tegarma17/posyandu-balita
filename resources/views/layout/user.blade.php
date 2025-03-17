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
                <a href="{{ route('user') }}"class="block bg-yellow-400 hover:bg-orange-400 text-white py-2 px-4 rounded-lg"
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
                        <th scope="col" class="px-6 py-3">
                            Username
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Password
                        </th>
                        <th scope="col" class="px-6 py-3  dark:bg-gray-800">
                            Nama User
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($paginatedItems as $item)
                        @if (isset($item->nama_nakes))
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                    {{ $item->user_name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $item->password_nakes }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->nama_nakes }}
                                </td>
                            </tr>
                        @elseif(isset($item->nama_balita))
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                    {{ $item->user_name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $item->password_balita }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->nama_balita }}
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>

        </div>
        <!-- End Tabel -->
        <div class="mt-4 flex justify-center ">
            {{ $paginatedItems->links('vendor.pagination.tailwind') }}

        </div>



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
