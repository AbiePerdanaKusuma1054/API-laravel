<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUraiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uraians', function (Blueprint $table) {
            $table->id();
            $table->longText('nama');
            $table->foreignId('intervensi_id')->constrained('intervensis')->onDelete('cascade');
            $table->foreignId('kategori_id')->constrained('kategori_uraians')->onDelete('cascade');
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
        Schema::dropIfExists('uraians');
    }
}
