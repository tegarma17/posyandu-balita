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

        Ktkbp::create(['prov_id' => '1', 'kd_ktkbp' => '35.15', 'nama' => 'Sidoarjo']);
    }
}
