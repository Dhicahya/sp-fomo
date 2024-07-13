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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pasien')->nullable();
            $table->integer('umur')->nullable();
            $table->string('instansi')->nullable();
            $table->float('hasil_tes')->nullable();
            $table->float('presentasi')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('kriteria_id')->nullable()->constrained('kriterias');
            $table->foreignId('solusi_id')->nullable()->constrained('solusis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
