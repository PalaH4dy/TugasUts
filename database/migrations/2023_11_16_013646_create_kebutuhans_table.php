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
        Schema::create('kebutuhans', function (Blueprint $table) {
            $table->id('id_kebutuhan');
            $table->enum('jenis_kebutuhan', ['SIMRS', 'NonSIMRS']);
            $table->string('tentang', 100)->nullable()->default('text');
            $table->string('deskripsi', 100)->nullable()->default('text');
            $table->enum('level', ['urgent', 'medium', 'low']);
            $table->string('image')->nullable();
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
        Schema::dropIfExists('kebutuhans');
    }
};
