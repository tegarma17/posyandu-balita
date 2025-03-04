<x-main-admin>
    <section class="container mx-auto my-5">
        <ul class="flex items-center text-sm ml-4 my-5">
            <li class="mr-2">
                <a href="#" class="text-gray-400 hover:text-gray-600 font-medium">Dashboard</a>
            </li>
            <li class="text-gray-600 mr-2 font-medium">/</li>
            <li class="text-gray-600 mr-2 font-medium"></li>
        </ul>
        <h4 class="text-2xl font-bold text-center my-4">{{ $title }}</h4>
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative mx-4">
            <div class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <input type="text" id="table-search"
                class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-6"
                placeholder="Nama Balita">
        </div>
        <div class="relative overflow-x-auto mx-5 sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class=" text-gray-700 uppercase dark:text-gray-400">
                    <tr class="bg-green-700 text-white font-semibold">
                        <th scope="col" class="px-6 py-3  dark:bg-gray-800">
                            Nama Balita
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Ibu
                        </th>
                        <th scope="col" class="px-6 py-3  dark:bg-gray-800">
                            Action
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @if ($jadwalPosyandu->selesai_posyandu >= now())
                        @foreach ($balita as $blt)
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                    {{ $blt->nama }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $blt->nama_ortu }}
                                </td>
                                <td
                                    class="flex flex-col md:flex-row md:space-x-2 space-y-2 md:space-y-0 px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                    <a href="{{ route('vip.penimbangan', $blt->id) }}"
                                        class="px-3 py-1 bg-emerald-500 rounded-lg font-medium text-white dark:text-red-500 hover:underline">Penimbangan</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                Belum ada jadwal Posyandu
                            </th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </section>
</x-main-admin>
