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
        Schema::create('satuan_barang', function (Blueprint $table) {
            $table->increments('id_satuan_barang');
            $table->string('kode_satuan_barang');
            $table->string('nama_satuan_barang');
            $table->integer('id_kategori')->default(0);
            $table->integer('id_kategori_detail')->default(0);
            $table->integer('jumlah')->default(1);
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
        Schema::dropIfExists('satuan_barang');
    }
};
