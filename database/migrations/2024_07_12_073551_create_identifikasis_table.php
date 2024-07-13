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
        Schema::create('identifikasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->nullable()->constrained('pasiens');
            $table->foreignId('kriteria_id')->nullable()->constrained('kriterias');
            $table->foreignId('pertanyaan_id')->nullable()->constrained('pertanyaans');
            $table->foreignId('solusis')->nullable()->constrained('solusis');
            $table->double('nilai_user', 8,3);
            $table->double('nilai_hasil', 8,3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('identifikasis');
    }
};
