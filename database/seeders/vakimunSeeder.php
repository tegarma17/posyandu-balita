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
            ['nama_vksn_imun' => 'Rotavirus', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'DTaP', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'Hib', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'PCV13', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'IPV', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'Influenza', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'MMR', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'VAR', 'created_at' => now(), 'updated_at' => now()],
            ['nama_vksn_imun' => 'Hepatitis A', 'created_at' => now(), 'updated_at' => now()],
        ];
        DB::table('imunivaks')->insert($data);
    }
}
