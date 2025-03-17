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
        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
            class="block mx-4 my-3 bg-hijautua hover:bg-hijaumuda text-white py-2 px-4 rounded-lg" type="button">
            Buat Jadwal
        </button>

        @if (session('error') || session('success'))
            <script>
                Swal.fire({
                    title: '{{ session('error') ? 'Error!' : 'Success!' }}', // Ganti title berdasarkan session
                    text: '{{ session('error') ?? session('success') }}', // Tampilkan pesan dari session
                    icon: '{{ session('error') ? 'error' : 'success' }}' // Ganti ikon berdasarkan jenis pesan
                });
            </script>
        @endif
        <!--Tabel Data  -->
        <div class="relative overflow-x-auto mx-5 sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class=" text-gray-700 uppercase dark:text-gray-400">
                    <tr class="bg-green-700 text-white font-semibold">
                        <th scope="col" class="px-6 py-3  dark:bg-gray-800">
                            Tanggal Posyandu
                        </th>

                        <th scope="col" class="px-6 py-3  dark:bg-gray-800">
                            Action
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @if ($tanggal_jadwal == null)
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                Belum ada jadwal
                            </th>
                        </tr>
                    @else
                        @foreach ($tanggal_jadwal as $jdwl)
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                    {{ \Carbon\Carbon::parse($jdwl->jadwal_posyandu)->isoFormat('dddd, D MMMM Y - H:m') }}
                                </th>

                                <th class="px-8 py-4 m-4 bg-gray-50 dark:bg-gray-800">
                                    <a href="{{ route('jadwal.detailAdmin', Crypt::encrypt($jdwl->jadwal_posyandu)) }}"
                                        class="py-1 px-3  bg-blue-400 rounded-lg font-medium text-white dark:text-red-500 hover:underline">Lihat
                                        Posyandu</a>
                                </th>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <!-- end Tabel Data -->
        <div class="mt-4 flex justify-center ">
            {{ $tanggal_jadwal->links('vendor.pagination.tailwind') }}

        </div>

        <!-- Modal Tambah -->
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
                    <form action="{{ route('jadwal.tambah') }}" class="p-4 md:p-5" method="POST">
                        @csrf
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2 sm:col-span-1">
                                <label for="price"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                                <select id="kecamatan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option selected="">Pilih Kecamatan</option>
                                    @foreach ($kecamatan as $kcmtn)
                                        <option value="{{ $kcmtn->id }}">{{ $kcmtn->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="price"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Desa</label>
                                <select id="desa"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option selected="">Pilih Desa</option>
                                    @foreach ($desa as $dsa)
                                        <option value="{{ $dsa->id }}" data-kecamatan="{{ $dsa->kecamatan_id }}">
                                            {{ $dsa->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-2">
                                <label for="category"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Posyandu</label>
                                <select id="posyandu" name="id_psynd"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option selected="">Pilih Posyandu</option>
                                    @foreach ($posyandu as $psynd)
                                        <option value="{{ $psynd->id }}" data-desa="{{ $psynd->desa_id }}">
                                            {{ $psynd->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-2">
                                <label for="price"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Tenaga Kesehatan</label>
                                <select id="nakes" name="id_nakes[]" multiple style="width: 100%"
                                    class="form-multiselect block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach ($nakes as $nks)
                                        <option value="{{ $nks->id }}">{{ $nks->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-2 ">
                                <label for="price"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kader</label>
                                <select id="kader" name="id_nakes[]" multiple style="width: 100%"
                                    class="form-multiselect block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach ($kader as $kdr)
                                        <option value="{{ $kdr->id }}">{{ $kdr->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-2 ">
                                <label for="category"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mulai
                                    Posyandu</label>
                                <input type="datetime-local" name="jadwal_posyandu" id="price"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="" required="">
                            </div>
                            <div class="col-span-2 ">
                                <label for="category"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selesai
                                    Posyandu</label>
                                <input type="datetime-local" name="selesai_posyandu" id="price"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="" required="">
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
        <script>
            $(document).ready(function() {
                $('#kecamatan').change(function() {
                    var kcmtnID = $(this).val();
                    $('#output').text('Kode Kecamatan: ' + kcmtnID);
                    $('#desa option').each(function() {
                        if ($(this).data('kecamatan') == kcmtnID || !kcmtnID) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    });
                    $('#desa').val('Pilih Desa');
                });
            });
            $(function() {
                $('#nakes').select2();
            });
            $(function() {
                $('#kader').select2();
            });

            $(document).ready(function() {
                $('#desa').change(function() {
                    var desaID = $(this).val();
                    $('#output').text('Kode Desa: ' + desaID);
                    $('#posyandu option').each(function() {
                        if ($(this).data('desa') == desaID || !desaID) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    });
                    $('#posyandu').val('Pilih Posyandu');
                });
            });

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
    </section>
</x-main-admin>
