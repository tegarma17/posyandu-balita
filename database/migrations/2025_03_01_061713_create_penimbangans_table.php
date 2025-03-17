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
        Schema::create('penimbangans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('posyandu_id')->constrained('posyandu')->onDelete('cascade');
            $table->foreignId('balita_id')->constrained('balita')->onDelete('cascade');
            $table->integer('bb');
            $table->string('usia', 2);
            $table->enum('keterangan', ['N', 'T', 'B', 'O']);
            $table->date('tanggal_penimbangan');
            $table->string('status_gizi', 50);
            $table->string('saran', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penimbangans');
    }
};
