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
            ['nama' => 'Hepatitis B', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Hepatitis A 1', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Hepatitis A 2', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'BCG', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Polio 0', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Polio 1', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Polio 2', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Polio 3', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Polio 4', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Polio 5', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Rotavirus 1', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Rotavirus 2', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Rotavirus 3', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'DTP 1', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'DTP 2', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'DTP 3', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'DTP 4', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'DTP 5', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Hib 1', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Hib 2', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Hib 3', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Hib 4', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'PCV 1', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'PCV 2', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'PCV 3', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'PCV 4', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Influenza 1', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Influenza Tahunan', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'MMR 1', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'MMR 2', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'VAR', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Tifoid 1', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Tifoid (Ulang setiap 3 Tahun)', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Japanese Encephalitis (JE) 2', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Hepatitis A', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Varicella 1', 'created_at' => now(), 'updated_at' => now()],
        ];
        DB::table('imunivaks')->insert($data);
    }
}
