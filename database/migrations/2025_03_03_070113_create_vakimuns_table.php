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
        Schema::create('vakimuns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jadwal');
            $table->foreign('id_jadwal')->references('id')->on('jadwals')->onDelete('cascade')->constrained();
            $table->unsignedBigInteger('id_imunivak');
            $table->foreign('id_imunivak')->references('id')->on('imunivaks')->onDelete('cascade')->constrained();
            $table->unsignedBigInteger('id_balita');
            $table->foreign('id_balita')->references('id')->on('balitas')->onDelete('cascade')->constrained();
            $table->date('tanggal_imunivak');
            $table->string('usia', 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vakimuns');
    }
};
