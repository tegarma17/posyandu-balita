<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidasiData extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'kd_psynd' => ['required', 'unique:posyand'],
            'nm_psynd' => ['required'],
            'alamat' => ['required'],
            'kd_ktkbp' => ['required'],
            'kd_kcmtn' => ['required'],
            'kd_desa' => ['required'],
            'prov' => ['required'],
            'nik' => ['required',  'max:16', 'numeric'],
            'no_hp' => ['required', 'max:13', 'numeric'],
            'no_kk' => ['required', 'max:16', 'numeric'],
            'no_kk_ortu' => ['required', 'max:16', 'numeric'],
            'tgl_lahir' => ['required'],
            'bb_awal' => ['required', 'numeric'],
            'tb_awal' => ['required', 'numeric'],
            'nama_ortu' => ['required'],
            'no_hp_ortu' => ['required', 'max:13', 'numeric'],

        ];
    }

    public function messages()
    {
        return [
            'kd_psynd.required' => 'Kode Posyandu Wajib diisi',
            'kd_psynd.unique' => 'Kode Posyandu Sudah ada',
            'nm_psynd.required' => 'Nama Posyandu Wajib diisi',
            'alamat.required' => 'Alamat Wajib diisi',
            'kd_ktkbp.required' => 'Kabupaten / Kota Wajib diisi',
            'kd_desa.required' => 'Desa Wajib diisi',
            'kd_kcmtn.required' => 'Kecamatan Wajib diisi',
            'prov.required' => 'Provinsi Wajib diisi',
            'nik.required' => 'NIK Wajib diisi',
            'nik.max' => 'NIK Terlalu Panjang',
            'nik.numeric' => 'NIK Harus Angka',
            'no_hp.required' => 'Nomer HP Wajib diisi',
            'np_hp.max' => 'Nomer HP Terlalu Panjang',
            'np_hp.numeric' => 'Nomer HP Harus Angka',
            'no_kk.required' => 'Nomer KK Wajib diisi',
            'no_kk.max' => 'Nomer KK Terlalu Panjang',
            'no_kk.numeric' => 'Nomer KK Harus Angka',
            'no_kk_ortu.required' => 'NIK Orang Tua Wajib diisi',
            'no_kk_ortu.max' => 'NIK Orang Tua Terlalu Panjang',
            'no_kk_ortu.numeric' => 'NIK Orang Tua Harus Angka',
            'tgl_lahir.required' => 'Tanggal Lahir wajib diisi',
            'bb_awal.required' => 'Berat Badan wajib diisi',
            'tb_awal.required' => 'Tinggi Badan wajib diisi',
            'bb_awal.numeric' => 'Berat Badan harus angka',
            'tb_awal.numeric' => 'Tinggi Badan harus angka',
            'nama_ortu.required' => 'Nama Orang Tua wajib diisi',
            'no_hp_ortu.required' => 'Nomer HP Orang Tua wajib diisi',
            'no_hp_ortu.max' => 'Nomer HP Orang Tua Terlalu Panjang',
            'no_hp_ortu.numeric' => 'Nomer HP Orang Tua Harus Angka',
        ];
    }
}
