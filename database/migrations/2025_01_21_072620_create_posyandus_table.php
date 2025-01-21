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
            $table->unsignedBigInteger('ktkbp_id');
            $table->foreign('ktkbp_id')->references('id')->on('ktkbp');
            $table->unsignedBigInteger('kecamatan_id');
            $table->foreign('kecamatan_id')->references('id')->on('kecamatan');
            $table->unsignedBigInteger('desa_id');
            $table->foreign('desa_id')->references('id')->on('desa');
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
