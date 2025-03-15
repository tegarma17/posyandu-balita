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
        Schema::create('ktkbp', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prov_id')->constrained('provinsi')->onDelete('cascade');
            $table->string('kd_ktkbp', 7)->unique();
            $table->string('nama', 50)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ktkbps');
    }
};
