<?php

namespace Database\Seeders;


use App\Models\Kecamatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kcmtnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kecamatan')->delete();
        Kecamatan::create([
            'kd_kcmtn' => 'KD001',
            'nm_kcmtn' => 'Wonoayu'
        ]);
    }
}
