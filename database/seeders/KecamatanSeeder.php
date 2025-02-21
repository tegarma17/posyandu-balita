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

        Kecamatan::create(['kd_ktkbp' => '35.15', 'kd_kcmtn' => '35.15.01', 'nm_kcmtn' => 'Tarik']);
        Kecamatan::create(['kd_ktkbp' => '35.15', 'kd_kcmtn' => '35.15.02', 'nm_kcmtn' => 'Prambon']);
        Kecamatan::create(['kd_ktkbp' => '35.15', 'kd_kcmtn' => '35.15.03', 'nm_kcmtn' => 'Krembung']);
        Kecamatan::create(['kd_ktkbp' => '35.15', 'kd_kcmtn' => '35.15.04', 'nm_kcmtn' => 'Porong']);
        Kecamatan::create(['kd_ktkbp' => '35.15', 'kd_kcmtn' => '35.15.05', 'nm_kcmtn' => 'Jabon']);
        Kecamatan::create(['kd_ktkbp' => '35.15', 'kd_kcmtn' => '35.15.06', 'nm_kcmtn' => 'Tanggulangin']);
        Kecamatan::create(['kd_ktkbp' => '35.15', 'kd_kcmtn' => '35.15.07', 'nm_kcmtn' => 'Candi']);
        Kecamatan::create(['kd_ktkbp' => '35.15', 'kd_kcmtn' => '35.15.08', 'nm_kcmtn' => 'Sidoarjo']);
        Kecamatan::create(['kd_ktkbp' => '35.15', 'kd_kcmtn' => '35.15.09', 'nm_kcmtn' => 'Tulangan']);
        Kecamatan::create(['kd_ktkbp' => '35.15', 'kd_kcmtn' => '35.15.10', 'nm_kcmtn' => 'Wonoayu']);
        Kecamatan::create(['kd_ktkbp' => '35.15', 'kd_kcmtn' => '35.15.11', 'nm_kcmtn' => 'Krian']);
        Kecamatan::create(['kd_ktkbp' => '35.15', 'kd_kcmtn' => '35.15.12', 'nm_kcmtn' => 'Balongbendo']);
        Kecamatan::create(['kd_ktkbp' => '35.15', 'kd_kcmtn' => '35.15.13', 'nm_kcmtn' => 'Taman']);
        Kecamatan::create(['kd_ktkbp' => '35.15', 'kd_kcmtn' => '35.15.14', 'nm_kcmtn' => 'Sukodono']);
        Kecamatan::create(['kd_ktkbp' => '35.15', 'kd_kcmtn' => '35.15.15', 'nm_kcmtn' => 'Buduran']);
        Kecamatan::create(['kd_ktkbp' => '35.15', 'kd_kcmtn' => '35.15.16', 'nm_kcmtn' => 'Gedangan']);
        Kecamatan::create(['kd_ktkbp' => '35.15', 'kd_kcmtn' => '35.15.17', 'nm_kcmtn' => 'Sedati']);
        Kecamatan::create(['kd_ktkbp' => '35.15', 'kd_kcmtn' => '35.15.18', 'nm_kcmtn' => 'Waru']);
    }
}
