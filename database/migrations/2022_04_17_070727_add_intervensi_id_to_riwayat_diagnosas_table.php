<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIntervensiIdToRiwayatDiagnosasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('riwayat_diagnosas', function (Blueprint $table) {
            $table->foreignId('intervensi_id')->constrained('intervensis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('riwayat_diagnosas', function (Blueprint $table) {
            $table->dropForeign('riwayat_diagnosas_intervensi_id_foreign');
            $table->dropColumn('intervensi_id');
        });
    }
}
