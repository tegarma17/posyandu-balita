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
        Schema::create('Kecamatan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ktkbp_id');
            $table->foreign('ktkbp_id')->references('id')->on('ktkbp');
            $table->string('kd_kcmtn')->unique();
            $table->string('nm_kcmtn')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Kecamatan');
    }
};
