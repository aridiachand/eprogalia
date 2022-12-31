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
        // tipe_input = 1:freetext 2:master
        Schema::create('permintaan_detail', function (Blueprint $table) {
            $table->increments('id_permintaan_detail');
            $table->integer('id_permintaan');
            $table->string('kode_permintaan');
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->integer('id_satuan_barang');
            $table->integer('tipe_input');
            $table->integer('harga_beli');
            $table->integer('jumlah');
            $table->integer('id_status_approve_reject')->default(0);
            $table->integer('id_user_approve_reject')->default(0);
            $table->timestamp('tanggal_approve_reject')->nullable();
            $table->integer('id_status_edit')->default(0);
            $table->integer('id_user_edit')->default(0);
            $table->timestamp('tanggal_edit')->nullable();
            $table->integer('id_status_approve')->default(0);
            $table->integer('subtotal');
            $table->integer('id_user_input');
            $table->string('deskripsi')->default('none');
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
