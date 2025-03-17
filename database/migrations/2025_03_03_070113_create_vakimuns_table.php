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
            $table->foreignId('imunivaks_id')->constrained('imunivaks')->onDelete('cascade');
            $table->foreignId('balita_id')->constrained('balita')->onDelete('cascade');
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
