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
        Schema::create('antrians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jadwal');
            $table->foreign('id_jadwal')->references('id')->on('jadwals')->onDelete('cascade')->constrained();
            $table->unsignedBigInteger('id_balita');
            $table->foreign('id_balita')->references('id')->on('balitas')->onDelete('cascade')->constrained();
            $table->integer('no_antri')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antrians');
    }
};
