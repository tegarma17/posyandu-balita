<x-main-admin>
    <section class="container mx-auto my-5">
        <ul class="flex items-center text-sm ml-4 my-5">
            <li class="mr-2">
                <a href="#" class="text-gray-400 hover:text-gray-600 font-medium">Dashboard</a>
            </li>
            <li class="text-gray-600 mr-2 font-medium">/</li>
            <li class="text-gray-600 mr-2 font-medium">{{ $title }}</li>
        </ul>
        <h4 class="text-2xl font-bold text-center my-4">Data Balita</h4>
        <!-- Tambah data balita -->
        <div class="flex justify-start">
            <a href="{{ route('tambah.balita') }}">
                <button class="mx-4 my-3 bg-hijautua hover:bg-hijaumuda text-white py-2 px-4 rounded-lg">Tambah
                    Data</button></a>
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
            <div class="flex justify-start">
                <button class="block mx-4  bg-hijautua hover:bg-hijaumuda text-white py-2 px-4 rounded-lg"
                    id="resetButton" type="submit">Cari</button>
                <a href="{{ route('balita.index') }}"class="block bg-yellow-400 hover:bg-orange-400 text-white py-2 px-4 rounded-lg"
                    id="resetButton" type="submit">Reset Pencarian</a>
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
                        <th scope="col" class="px-6 py-3  dark:bg-gray-800">
                            Alamat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($balita as $blt)
                        <tr class="border-b border-gray-200 dark:border-gray-700 text-center">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                {{ $blt->nama }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $blt->nama_ortu }}
                            </td>
                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                {{ $blt->alamat }}
                            </td>
                            <td class="px-6 py-4 text-center font-bold tracking-wider">
                                <div class="flex gap-3 items-center justify-center text-white ">
                                    <form action="{{ route('balita.delete', $blt->id) }}" method="POST"
                                        onsubmit="return confirmDelete(event)">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 py-3 px-6 rounded-lg dark:text-red-500 hover:underline transition duration-150 ease-in-out">Delete</button>
                                        <a href="{{ route('balita.edit', $blt->id) }}"
                                            class="bg-yellow-400 py-3 px-6 mb-3 rounded-lg dark:text-red-500 hover:underline">Edit</a>
                                    </form>
                                </div>
                            </td>
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
        <div id="popup-modal" tabindex="-1"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full ttransition-opacity duration-300">
            <div class="relative p-4 w-full max-w-md max-h-full ">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="popup-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to
                            delete this product?</h3>
                        <button data-modal-hide="popup-modal" type="button"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Yes, I'm sure
                        </button>
                        <button data-modal-hide="popup-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                            cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-main-admin>
