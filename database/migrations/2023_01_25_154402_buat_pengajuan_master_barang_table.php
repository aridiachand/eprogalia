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
        Schema::create('pengajuan_master_barang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_pengajuan');
            $table->string('nama_barang');
            $table->integer('id_suggest_nama_barang')->default(0);
            $table->string('suggest_nama_barang')->nullable();
            $table->string('satuan_barang')->nullable();
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
