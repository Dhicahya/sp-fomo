<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Kriteria;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rel_indikators', function (Blueprint $table) {
            $table->id();
            $table->string('kode1');
            $table->string('kode2');
            $table->double('bobot');
            $table->foreignIdFor(Kriteria::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rel_indikators');
    }
};
