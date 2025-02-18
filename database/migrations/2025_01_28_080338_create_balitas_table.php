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
        Schema::create('balitas', function (Blueprint $table) {
            $table->id();
            $table->string('kd_ktkbp');
            $table->foreign('kd_ktkbp')->references('kd_ktkbp')->on('ktkbp')->onDelete('cascade');
            $table->string('kd_kcmtn');
            $table->foreign('kd_kcmtn')->references('kd_kcmtn')->on('kecamatan')->onDelete('cascade');
            $table->string('kd_desa');
            $table->foreign('kd_desa')->references('kd_desa')->on('desa')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nik', 16)->unique();
            $table->string('no_kk', 16)->unique();
            $table->string('no_kk_ortu', 16)->unique();
            $table->string('nama');
            $table->enum('jns_klmn', ['l', 'p']);
            $table->date('tgl_lahir');
            $table->string('tmpt_lahir');
            $table->string('bb_awal', 3);
            $table->string('tb_awal', 3);
            $table->string('nama_ortu');
            $table->string('no_hp_ortu', 16);
            $table->string('anak_ke', 2);
            $table->string('alamat');
            $table->string('prov');
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
