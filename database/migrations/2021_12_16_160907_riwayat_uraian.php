<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RiwayatUraian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('riwayat_uraians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('uraian_id')->constrained('uraians')->onDelete('cascade');
            $table->foreignId('riwayat_diagnosa_id')->constrained('riwayat_diagnosas')->onDelete('cascade');
            $table->string('penjelasan_uraian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('riwayat_uraians');
    }
}
