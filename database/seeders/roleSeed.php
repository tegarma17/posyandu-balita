<?php

namespace Database\Seeders;

use App\Models\roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class roleSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        roles::create(['nama_role' => 'ADMIN']);
        roles::create(['nama_role' => 'Kader Posyandu']);
        roles::create(['nama_role' => 'Tenaga Kesehatan']);
        roles::create(['nama_role' => 'Orang Tua']);
    }
}
