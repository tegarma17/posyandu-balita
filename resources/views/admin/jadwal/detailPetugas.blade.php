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
                            Nama Tenaga Kesehatan / Kader
                        </th>
                        <th scope="col" class="px-6 py-3  dark:bg-gray-800">
                            Jabatan
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
                                {{ $jdwl->nakes->nama }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                {{ $jdwl->nakes->user->role->nama_role }}
                            </th>

                            <th class="px-8 py-4 m-4 bg-gray-50 dark:bg-gray-800">
                                <a href="{{ route('jadwal.edit', Crypt::encrypt($jdwl->id)) }}"
                                    class="py-1 px-3  bg-blue-400 rounded-lg font-medium text-white dark:text-red-500 hover:underline">Edit
                                    Jadwal</a>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- end Tabel Data -->
        <div class="mt-4 flex justify-center ">

        </div>

        <!-- Modal Tambah -->


    </section>
</x-main-admin>
