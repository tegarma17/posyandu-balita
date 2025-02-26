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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_psynd');
            $table->foreign('id_psynd')->references('id')->on('posyandu')->onDelete('cascade')->constrained();
            $table->unsignedBigInteger('id_nakes');
            $table->foreign('id_nakes')->references('id')->on('nakes')->onDelete('cascade')->constrained();
            $table->timestamp('jadwal_posyandu')->nullable();
            $table->timestamp('selesai_posyandu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
