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
        Schema::create('pengukurans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('balita_id')->constrained('balita')->onDelete('cascade');
            $table->foreignId('posyandu_id')->constrained('posyandu')->onDelete('cascade');
            $table->integer('tb');
            $table->date('tanggal_pengukuran');
            $table->enum('metode', ['berdiri', 'terlentang']);
            $table->string('status_gizi', 50);
            $table->string('usia', 2);
            $table->string('saran', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengukurans');
    }
};
