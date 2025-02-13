<?php

namespace Database\Seeders;

use App\Models\Ktkbp;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KtkbpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('ktkbp')->insert(['kd_ktkbp' => '35', 'nm_ktkbp' => 'Sidoarjo']);
        Ktkbp::create(['kd_ktkbp' => '35.15', 'nm_ktkbp' => 'Sidoarjo']);
    }
}
