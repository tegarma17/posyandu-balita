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
            $table->unsignedBigInteger('ktkbp_id');
            $table->foreign('ktkbp_id')->references('id')->on('ktkbp');
            $table->unsignedBigInteger('kecamatan_id');
            $table->foreign('kecamatan_id')->references('id')->on('kecamatan');
            $table->unsignedBigInteger('desa_id');
            $table->foreign('desa_id')->references('id')->on('desa');
            $table->string('nik', 16)->unique();
            $table->string('no_kk', 16)->unique();
            $table->string('no_kk_ortu', 16)->unique();
            $table->string('nama');
            $table->enum('jns_klmn', ['l', 'p']);
            $table->date('tgl_lahir');
            $table->string('tmpt_lahir');
            $table->string('bb_awal');
            $table->string('tb_awal');
            $table->string('nama_ortu');
            $table->string('no_hp_ortu', 16);
            $table->string('anak_ke', 2);
            $table->string('alamat');
            $table->string('prov');
            $table->string('rt', 2);
            $table->string('rw', 2);
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
