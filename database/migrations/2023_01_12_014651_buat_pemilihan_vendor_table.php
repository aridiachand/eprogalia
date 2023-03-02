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
        Schema::create('pemilihan_vendor', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_vendor')->nullable();
            $table->string('nama_vendor')->nullable();
            $table->string('attachment')->nullable();
            $table->string('kode_permintaan');
            $table->integer('id_permintaan')->nullable();
            $table->integer('id_permintaan_detail');
            $table->integer('id_barang')->nullable();
            $table->string('nama_barang')->nullable();
            $table->string('file_path')->nullable();
            $table->string('keterangan')->nullable();
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
    }
};
