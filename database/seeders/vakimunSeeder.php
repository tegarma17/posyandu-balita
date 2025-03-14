<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class vakimunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama_vksn_imun' => 'Hepatitis B', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'Hepatitis A 1', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'Hepatitis A 2', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'BCG', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'Polio 0', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'Polio 1', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'Polio 2', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'Polio 3', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'Polio 4', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'Polio 5', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'Rotavirus 1', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'Rotavirus 2', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'Rotavirus 3', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'DTP 1', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'DTP 2', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'DTP 3', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'DTP 4', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'DTP 5', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'Hib 1', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'Hib 2', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'Hib 3', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'Hib 4', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'PCV 1', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'PCV 2', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'PCV 3', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'PCV 4', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'Influenza 1', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'Influenza Tahunan', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'MMR 1', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'MMR 2', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'VAR', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'Tifoid 1', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'Tifoid (Ulang setiap 3 Tahun)', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'Japanese Encephalitis (JE) 2', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'Hepatitis A', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'Varicella 1', 'created_at' => now(), 'updated_at' => now()],
        ];
        DB::table('imunivaks')->insert($data);
    }
}
