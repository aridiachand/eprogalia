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
        Schema::create('barang', function (Blueprint $table) {
            $table->increments('id_barang');
            $table->integer('id_kategori');
            $table->integer('id_kategori_detail');
            $table->string('kode_barang')->unique();
            $table->string('nama_barang');
            $table->string('merk_barang');
            $table->integer('harga_beli')->default(0);
            $table->integer('diskon_persen')->default(0);
            $table->integer('diskon_rp')->default(0);
            $table->integer('harga_jual')->default(0);
            $table->integer('stok')->default(0);
            $table->tinyInteger('rutin')->default(0);
            $table->integer('id_user_input');
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
        Schema::dropIfExists('barang');
    }
};
