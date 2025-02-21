<x-main-admin>
    <section class="container mx-auto my-5">
        <ul class="flex items-center text-sm ml-4 my-5">
            <li class="mr-2">
                <a href="/dshbrd" class="text-gray-400 hover:text-gray-600 font-medium">Dashboard</a>
            </li>
            <li class="text-gray-600 mr-2 font-medium">/ </li>
            <a href="/dta_blt">
                <li class="text-gray-400 hover:text-gray-600 font-medium mr-2"> Data Balita</li>
            </a>
            <li class="text-gray-600 mr-2 font-medium">/</li>
            <li class="text-gray-600 mr-2 font-medium">{{ $title }}</li>
        </ul>
        <a href="{{ route('balita.index') }}"><button
                class="mx-4  bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg">
                Kembali
            </button></a>
        <h4 class="text-2xl font-bold text-center my-4">Edit Data Balita {{ $balita->nama }}</h4>
        <div class="mx-auto w-full ">
            <form action="{{ route('balita.update', $balita->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="flex flex-wrap mx-3 mb-6">
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            NIK
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            type="number" placeholder="NIK Balita" name="nik"
                            value="{{ old('nik', $balita->nik) }}">
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            No. Kartu Keluarga
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            type="number" placeholder="Nomer Kartu Keluarga" name="no_kk"
                            value="{{ old('no_kk', $balita->no_kk) }}">
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            NIK Orang Tua
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            type="number" placeholder="NIK Orang Tua" name="no_kk_ortu"
                            value="{{ old('no_kk_ortu', $balita->no_kk_ortu) }}">
                    </div>
                </div>
                <div class="flex flex-wrap mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Nama Balita
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            type="text" placeholder="Nama Balita" name="nama"
                            value="{{ old('nama', $balita->nama) }}">
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-state">
                            Jenis Kelamin
                        </label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                name="jns_klmn">
                                <option>Pilih Jenis Kelamin</option>
                                <option value="l" {{ $balita->jns_klmn == 'l' ? 'selected' : '' }}>Laki - Laki
                                </option>
                                <option value="p" {{ $balita->jns_klmn == 'p' ? 'selected' : '' }}>Perempuan
                                </option>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Tanggal Lahir
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            type="date" placeholder="Tanggal Lahir Balita" name="tgl_lahir"
                            value="{{ old('tgl_lahir', $balita->tgl_lahir) }}">

                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Tempat Lahir
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            type="text" placeholder="Nama Kota" name="tmpt_lahir"
                            value="{{ old('tmpt_lahir', $balita->tmpt_lahir) }}">
                    </div>
                </div>
                <div class="flex flex-wrap mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Berat Badan
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            type="number" placeholder="Satuan (KG)" name="bb_awal"
                            value="{{ old('bb_awal', $balita->bb_awal) }}">
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Tinggi Badan
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            type="number" placeholder="Satuan (KG)" name="tb_awal"
                            value="{{ old('tb_awal', $balita->tb_awal) }}">
                    </div>
                </div>
                <div class="flex flex-wrap mx-3 mb-6">
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Nama Orang Tua
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            type="text" placeholder="Nama Ayah / Ibu" name="nama_ortu"
                            value="{{ old('nama_ortu', $balita->nama_ortu) }}">
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Nomer Hp Orang Tua
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            type="number" placeholder="Nomer HP Ayah / Ibu" name="no_hp_ortu"
                            value="{{ old('no_hp_ortu', $balita->no_hp_ortu) }}">
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Anak Ke-
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            type="number" placeholder="Anak Ke-" name="anak_ke"
                            value="{{ old('anak_ke', $balita->anak_ke) }}">
                    </div>
                </div>
                <div class="flex flex-wrap mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-password">
                            Alamat
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            type="text" placeholder="Alamat Lengkap" name="alamat"
                            value="{{ old('alamat', $balita->alamat) }}">

                    </div>
                </div>
                <div class="flex flex-wrap mx-3 mb-6">
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Provinsi
                        </label>
                        <div class="relative">
                            <select name="prov"
                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option>Pilih Provinsi</option>
                                <option value="35" {{ $balita->prov == '35' ? 'selected' : '' }}>Jawa Timur
                                </option>

                            </select>

                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Kabupaten / Kota
                        </label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                name="kd_ktkbp">
                                <option>Pilih Kabupaten</option>
                                @foreach ($ktkbp as $ktkb)
                                    <option value="{{ $ktkb->kd_ktkbp }}">{{ $ktkb->nm_ktkbp }}</option>
                                    <option value="{{ $ktkb->kd_ktkbp }}"
                                        {{ $balita->kd_ktkbp == $ktkb->kd_ktkbp ? 'selected' : '' }}>
                                        {{ $ktkb->nm_ktkbp }}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Kecamatan
                        </label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="kecamatan" name="kd_kcmtn">
                                <option>Pilih Kecamatan</option>
                                @foreach ($kcmtn as $kecamatan)
                                    <option value="{{ $kecamatan->kd_kcmtn }}"
                                        {{ $balita->kd_kcmtn == $kecamatan->kd_kcmtn ? 'selected' : '' }}>
                                        {{ $kecamatan->nm_kcmtn }}</option>
                                @endforeach
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap mx-3 mb-6">
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Desa
                        </label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="desa" name="kd_desa">
                                <option>Pilih Desa</option>
                                @foreach ($desa as $dsa)
                                    <option value="{{ $dsa->kd_desa }}" data-kecamatan="{{ $dsa->kd_kcmtn }}"
                                        {{ $balita->kd_desa == $dsa->kd_desa ? 'selected' : '' }}>
                                        {{ $dsa->nm_desa }}</option>
                                @endforeach
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            RW
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            type="number" placeholder="001 / 01" name="rw"
                            value="{{ old('rw', $balita->rw) }}">
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            RT
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            type="number" placeholder="001 / 01" name="rt"
                            value="{{ old('rw', $balita->rt) }}">
                    </div>
                </div>
                <button class="mx-4 my-3 bg-hijautua hover:bg-hijaumuda text-white font-bold py-2 px-4 rounded-lg">
                    Tambah Data
                </button>
            </form>
        </div>
    </section>
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
    </script>
</x-main-admin>
