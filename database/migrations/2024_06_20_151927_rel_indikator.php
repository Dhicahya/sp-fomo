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
            $table->unsignedBigInteger('indikator1');
            $table->unsignedBigInteger('indikator2');
            $table->double('nilai');
            $table->timestamps();

            $table->foreign('indikator1')->references('id')->on('indikators')->onDelete('cascade');
            $table->foreign('indikator2')->references('id')->on('indikators')->onDelete('cascade');
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
