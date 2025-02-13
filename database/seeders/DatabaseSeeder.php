<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(KtkbpSeeder::class);
        $this->call(KecamatanSeeder::class);
        $this->call(DesaSeeder::class);
        $this->call(roleSeed::class);
    }
}
