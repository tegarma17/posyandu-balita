<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('balita', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desa')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nik', 20)->unique();
            $table->string('no_kk', 20)->unique();
            $table->string('nik_ortu', 20)->unique();
            $table->string('nama', 50);
            $table->enum('jns_klmn', ['l', 'p']);
            $table->date('tgl_lahir');
            $table->string('tmpt_lahir', 25);
            $table->string('bb_awal', 3);
            $table->string('tb_awal', 3);
            $table->string('nama_ortu', 50);
            $table->string('no_hp_ortu', 16);
            $table->string('anak_ke', 2);
            $table->string('alamat', 100);
            $table->string('rt', 3);
            $table->string('rw', 3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balitas');
    }
};
