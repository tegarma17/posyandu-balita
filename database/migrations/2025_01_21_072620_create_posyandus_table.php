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
        Schema::create('posyandu', function (Blueprint $table) {
            $table->id();
            $table->string('kd_ktkbp');
            $table->foreign('kd_ktkbp')->references('kd_ktkbp')->on('ktkbp');
            $table->string('kd_kcmtn');
            $table->foreign('kd_kcmtn')->references('kd_kcmtn')->on('kecamatan');
            $table->string('kd_desa');
            $table->foreign('kd_desa')->references('kd_desa')->on('desa');
            $table->string('kd_psynd');
            $table->string('nm_psynd');
            $table->string('alamat');
            $table->string('prov');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posyandus');
    }
};
