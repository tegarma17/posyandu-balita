<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Kecamatan::create(['ktkbp_id' => '1', 'kd_kcmtn' => '35.15.01', 'nama' => 'Tarik']);
        Kecamatan::create(['ktkbp_id' => '1', 'kd_kcmtn' => '35.15.02', 'nama' => 'Prambon']);
        Kecamatan::create(['ktkbp_id' => '1', 'kd_kcmtn' => '35.15.03', 'nama' => 'Krembung']);
        Kecamatan::create(['ktkbp_id' => '1', 'kd_kcmtn' => '35.15.04', 'nama' => 'Porong']);
        Kecamatan::create(['ktkbp_id' => '1', 'kd_kcmtn' => '35.15.05', 'nama' => 'Jabon']);
        Kecamatan::create(['ktkbp_id' => '1', 'kd_kcmtn' => '35.15.06', 'nama' => 'Tanggulangin']);
        Kecamatan::create(['ktkbp_id' => '1', 'kd_kcmtn' => '35.15.07', 'nama' => 'Candi']);
        Kecamatan::create(['ktkbp_id' => '1', 'kd_kcmtn' => '35.15.08', 'nama' => 'Sidoarjo']);
        Kecamatan::create(['ktkbp_id' => '1', 'kd_kcmtn' => '35.15.09', 'nama' => 'Tulangan']);
        Kecamatan::create(['ktkbp_id' => '1', 'kd_kcmtn' => '35.15.10', 'nama' => 'Wonoayu']);
        Kecamatan::create(['ktkbp_id' => '1', 'kd_kcmtn' => '35.15.11', 'nama' => 'Krian']);
        Kecamatan::create(['ktkbp_id' => '1', 'kd_kcmtn' => '35.15.12', 'nama' => 'Balongbendo']);
        Kecamatan::create(['ktkbp_id' => '1', 'kd_kcmtn' => '35.15.13', 'nama' => 'Taman']);
        Kecamatan::create(['ktkbp_id' => '1', 'kd_kcmtn' => '35.15.14', 'nama' => 'Sukodono']);
        Kecamatan::create(['ktkbp_id' => '1', 'kd_kcmtn' => '35.15.15', 'nama' => 'Buduran']);
        Kecamatan::create(['ktkbp_id' => '1', 'kd_kcmtn' => '35.15.16', 'nama' => 'Gedangan']);
        Kecamatan::create(['ktkbp_id' => '1', 'kd_kcmtn' => '35.15.17', 'nama' => 'Sedati']);
        Kecamatan::create(['ktkbp_id' => '1', 'kd_kcmtn' => '35.15.18', 'nama' => 'Waru']);
    }
}
