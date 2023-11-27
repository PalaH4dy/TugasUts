<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_kebutuhans', function (Blueprint $table) {
            $table->id('id_pengajuan');
            $table->foreignId('id_pegawai');
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawais')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('id_kebutuhan');
            $table->foreign('id_kebutuhan')->references('id_kebutuhan')->on('kebutuhans')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('id_katagori');
            $table->foreign('id_katagori')->references('id_katagori')->on('katagoris')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('id_progres');
            $table->foreign('id_progres')->references('id_progres')->on('progres')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('id_pic');
            $table->foreign('id_pic')->references('id_pic')->on('penanggung_jawabs')->cascadeOnUpdate()->cascadeOnDelete();
            $table->date('tanggal_pengajuan');
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
        Schema::dropIfExists('pengajuan_kebutuhans');
    }
};
