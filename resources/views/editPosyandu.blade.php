<x-main-admin>

    <section class="container mx-auto my-5">
        <ul class="flex items-center text-sm ml-4 my-5">
            <li class="mr-2">
                <a href="/dshbrd" class="text-gray-400 hover:text-gray-600 font-medium">Dashboard</a>
            </li>
            <li class="text-gray-600 mr-2 font-medium">/ </li>
            <a href="/psyndu">
                <li class="text-gray-400 hover:text-gray-600 font-medium mr-2">Data Posyandu</li>
            </a>
            <li class="text-gray-600 mr-2 font-medium">/</li>
            <li class="text-gray-600 mr-2 font-medium">Edit Data Posyandu</li>
        </ul>
        <a href="/psyndu"><button
                class="mx-4  bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg">
                Kembali
            </button></a>
        <h4 class="text-2xl font-bold text-center my-4">Data Posyandu</h4>

        <form class="mx-auto w-full" action="{{ route('psynd.update', $id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="flex flex-wrap mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-first-name">
                        Kode Posyandu
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="grid-first-name" type="text" placeholder="Kode Posyandu" name="kd_psynd"
                        value="{{ old('kd_psyndu', $posyandu->kd_psynd) }}">
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                        Nama Posyandu
                    </label>
                    <div class="relative">
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="grid-first-name" type="text" placeholder="Nama Posyandu" name="nm_psynd"
                            value="{{ old('nm_psynd', $posyandu->nm_psynd) }}">
                    </div>
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
                        id="grid-password" type="text" placeholder="Alamat" name="alamat"
                        value="{{ old('alamat', $posyandu->alamat) }}">
                </div>
            </div>
            <div class="flex flex-wrap mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-first-name">
                        Provinsi
                    </label>
                    <select
                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="provinsi" name="prov">
                        <option value="Jawa Timur" {{ old('prov', $posyandu->prov) == '1' ? 'selected' : '' }}>
                            Jawa Timur</option>
                    </select>
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                        Kabupaten / Kota
                    </label>
                    <div class="relative">
                        <select
                            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="ktkbp" name="kbktp_id">
                            <option value="Sidoarjo" {{ old('kbktp', $posyandu->kbktp_id) == '1' ? 'selected' : '' }}>
                                Sidoarjo</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-first-name">
                        Kecamatan
                    </label>
                    <select name="kecamatan_id" id="status"
                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="kecamatan" name="kecamatan_id">
                        @foreach ($kecamatan as $kcmtn)
                            <option value="{{ $kcmtn->id }}"
                                {{ $posyandu->kecamatan_id == $kcmtn->id ? 'selected' : '' }}>
                                {{ $kcmtn->nm_kcmtn }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                        Desa
                    </label>
                    <div class="relative">
                        <select
                            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="desa" name="desa_id">
                            @foreach ($desa as $dsa)
                                <option value="{{ $dsa->id }}"
                                    {{ $posyandu->desa_id == $dsa->id ? 'selected' : '' }}>
                                    {{ $dsa->nm_desa }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <button class="mx-4 my-3 bg-hijautua hover:bg-hijaumuda text-white font-bold py-2 px-4 rounded-lg">
                Tambah Data
            </button>
        </form>
    </section>
    <script>
        document.getElementById('kecamatan').addEventListener('change', function() {
            let kcmtn_id = this.value;
            if (kcmtn_id) {
                fetch(`/get-desa/${kcmtn_id}`)
                    .then(response => response.json())
                    .then(desa => {
                        let desaPilih = document.getElementById('desa');
                        desaPilih.innerHTML = '<option value="">Pilih Desa</option>';
                        desa.forEach(dsa => {
                            let option = document.createElement('option');
                            option.value = dsa.id;
                            option.textContent = dsa.nm_desa;
                            desaPilih.appendChild(option);
                        });
                    });
            } else {
                document.getElementById('desa').innerHTML = '<option value="">Select Desa</option>';
            }
        });
    </script>
</x-main-admin>
