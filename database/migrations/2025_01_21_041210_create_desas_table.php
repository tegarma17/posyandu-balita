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
        Schema::create('desa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kcmtn_id');
            $table->foreign('kcmtn_id')->references('id')->on('kecamatan');
            $table->string('kd_desa')->unique();
            $table->string('nm_desa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desas');
    }
};
