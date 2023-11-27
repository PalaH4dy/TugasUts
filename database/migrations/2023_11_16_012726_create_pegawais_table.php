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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id('id_pegawai');
            $table->foreignId('id_bagian');
            $table->foreign('id_bagian')->references('id_bagian')->on('bagians')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('nama_pegawai', 100)->nullable()->default('text');
            $table->string('alamat', 100)->nullable()->default('text');
            $table->enum('jenis_kelamin', ['laki-laki', 'prempuan']);
            $table->string('no_wa', 20)->nullable()->default('text');
            $table->date('tanggal_lahir');
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
        Schema::dropIfExists('pegawais');
    }
};
