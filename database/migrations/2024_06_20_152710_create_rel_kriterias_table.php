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
        Schema::create('rel_kriterias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kriteria1');
            $table->unsignedBigInteger('kriteria2');
            $table->double('nilai');
            $table->timestamps();

            $table->foreign('kriteria1')->references('id')->on('kriterias')->onDelete('cascade');
            $table->foreign('kriteria2')->references('id')->on('kriterias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rel_kriterias');
    }
};
